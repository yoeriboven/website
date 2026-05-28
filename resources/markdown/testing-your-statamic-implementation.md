This blog uses Statamic and since I like to write tests I wanted to test my implementation of it.

Unfortunately Statamic doesn't use Eloquent so you can't use Laravel's factories to whip up a new article for testing.

I dove into Statamic's code and came up with [this trait](https://gist.github.com/yoeriboven/08f751dc7beba7452491c148cea806d5).

```php
<?php

namespace Tests;

use Exception;
use Statamic\Facades\User;
use Statamic\Stache\Stache;
use Statamic\Entries\Entry;

trait WithStatamicEntryFaking
{
    protected array $filesToRemove = [];

    protected function cleanupStatamicData(): void
    {
        foreach ($this->filesToRemove as $file) {
            unlink($file);
        }
    }

    protected function makeStatamicUser(): \Statamic\Auth\File\User
    {
        $user = User::make()
            ->id((new Stache())->generateId())
            ->email('random@email.com')
            ->save();

        $this->filesToRemove[] = $user->initialPath();

        return $user;
    }

    protected function makeEntry(callable $callback): Entry
    {
        $entry = $callback();

        if (is_null($entry)) {
            throw new Exception('Entry not found.');
        }

        $this->filesToRemove[] = $entry->initialPath();

        return $entry;
    }
}
```

Let me explain it.

`makeStatamicUser()` creates a Statamic user which you can then log in. This is useful if you want to make a distinction between what a user and a guest see.

For example: everyone should see published posts on this blog, but only admins should see draft posts.

`makeEntry()` creates the entry. Use it like this:

```php
use Statamic\Facades\Entry;

$this->makeEntry(function () use ($title, $published) {
    $slug = Str::random(15);

    Entry::make()
        ->collection('articles')
        ->published($published)
        ->slug($slug)
        ->data([
            'title' => $title,
        ])
        ->saveQuietly();

    return Entry::findBySlug($slug, 'articles');
});
```

Using it is a little clunky, but you can hide it in a method (I did that and will show you later).

## Removing test files

The last method is the most important one.

Statamic uses a flat file system. It doesn't use the database so you can't refresh the database and get rid of all models that were created during the tests.

Everytime you create a user or entry, Statamic creates a file in your app's folder. You certainly don't want that.

`makeStatamicUser()` and `makeEntry()` store the path to the files and `cleanupStatamicData` removes the files.

It's important to call this after every test. I added it to my base test file.

```php
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, WithStatamicEntryFaking;

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->cleanupStatamicData();
    }
}
```

## Clearer methods
You wouldn't want to write the code above every time you need to create an article. For this blog I abstracted it away into a simpler method. You can add these to the trait or to the base test.

```php
use Statamic\Facades\Entry;

public function createArticle(string $title, bool $published = true): \Statamic\Entries\Entry
{
    return $this->makeEntry(function () use ($title, $published) {
        $slug = Str::random(15);

        Entry::make()
            ->collection('articles')
            ->published($published)
            ->slug($slug)
            ->data([
                'title' => $title,
            ])
            ->saveQuietly();

        return Entry::findBySlug($slug, 'articles');
    });
}
```

Now you can write `$this->createArticle('My first article');` in your tests.

To login a Statamic user, add this to your tests.

```php
public function loginStatamicUser(): void
{
    $this->actingAs($this->makeStatamicUser());
}
```

## Writing the tests!

Tests become really clear with these abstractions. Here's [two tests](https://github.com/yoeriboven/website/blob/main/tests/Feature/ShowArticleTest.php) I wrote for the page you are currently visiting.

```php
/** @test */
public function it_rejects_guests_if_article_is_draft()
{
    $article = $this->createArticle(title: 'A draft post', published: false);

    $this->get(route('article', $article->slug()))
        ->assertForbidden();
}

/** @test */
public function it_shows_the_article_to_user_if_its_a_draft()
{
    $this->loginStatamicUser();

    $article = $this->createArticle(title: 'A draft post', published: false);

    $this->get(route('article', $article->slug()))
        ->assertInertia(function (Assert $page) {
            $page->component('Article')
                ->where('article.title', 'A draft post');
        });
}
```

## In closing
Testing Statamic was a pain before I figured out what you just read. If this helped you, I appreciate a [retweet](https://twitter.com/yoeriboven/status/1532625634467389440)!