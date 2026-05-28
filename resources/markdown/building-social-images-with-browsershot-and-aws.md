Social images are a great way to make your links stand out on social media. Add a link to an image in your page's meta tag and most platforms will automatically show it.

![Example of a social image](/img/articles/social-image-example.png)

You could manually create one for each page, but depending on the amount of pages it could be a lot of work.

By using [Spatie's Browsershot](https://spatie.be/docs/browsershot/v2/introduction) we can easily create these images automatically when the page is published.

Browsershot is a package that can take a screenshot of a webpage. This means we can create the image with HTML and CSS and then get Browsershot to take a screenshot of it.

We then save this screenshot and add a link to it on our pages.

## Creating the template
The page with the template on it is a simple blade view. It is important its dimensions are 1200 x 630. This is the size that looks best on most social media.

```php
Route::view('blog/social-image/{article}', 'social_image')->name('social-image');
```

You can see the template for this article [here](https://yoeri.me/blog/social-image/building-social-images-with-browsershot). Here's the [source code](https://github.com/yoeriboven/website/blob/main/resources/views/social_image.blade.php).

## AWS
Browsershot requires Node.js and Puppeteer to run. Because I didn't want to install these on my server I run Browsershot on AWS Lambda.

This is made very easy by using two packages.

[Sidecar](https://hammerstone.dev/sidecar/docs/main/overview) lets you run PHP on Lambda. Install the package and configure it. Configuring is made effortless by running `php artisan sidecar:configure`.

[Browsershot Sidecar](https://github.com/stefanzweifel/sidecar-browsershot) needs no configuration. You use it by simply calling `Browsershot` functions on `BrowsershotLambda` instead.

Finally you'll have to install [Browsershot](https://spatie.be/docs/browsershot) itself.

## Taking the screenshot
It's time to create the image.

```php
use Wnx\SidecarBrowsershot\BrowsershotLambda;

$screenshot = BrowsershotLambda::url(route('social-image', $slug))
			->setScreenshotType('jpeg', 100)
			->deviceScaleFactor(2)
			->windowSize(1200, 630)
			->screenshot();
```

Here I'm setting the window size equal to the size of our template. This means it will only screenshot our template. The `deviceScaleFactor` is set to 2 to accommodate for retina displays.

Now you will need to store the image. `screenshot()` returns an image which you can store using Laravels `Storage` facade.

```php
Storage::disk('s3')->put("/img/social/{$slug}.jpeg", $screenshot);
```

## Adding the meta tags
The meta tag `og:image` expects a URL to your image. You can set the other tags as well to look even better on social media.

```php
<meta property="og:title" content="{{ $article['title'] }}">
<meta property="og:type" content="article" />
<meta property="og:description" content="{{ $article['meta_description'] }}">
<meta property="og:image" content="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url("/img/social/{$article['slug']}.jpeg") }}">  
<meta property="og:url" content="{{ url()->current() }}">
<meta property="article:author" content="Yoeri Boven">
<meta name="twitter:card" content="summary_large_image">
```

I'm using Statamic so there is no `Article` model for me to use. If you do have an `Article` or `Post` model, I advise you to add a `socialImage` method to your model. That will look much better than inlining it like I had to do here.
  
## When to run?
You can now run the Browsershot code every time the post, page, product, etc updates. When using Eloquent you can use [model events](https://laravel.com/docs/9.x/eloquent#events).

I'd advise you to check whether any of the attributes used in the template acutally changed. You probably don't want to recreate the image when someone changes something that you don't even use in the template.

## Using Statamic
I'm using Statamic for this blog and learned a few things when using it.

You should listen to the `EntrySaved` event.

In your `EventServiceProvider` add:
```php
protected $listen = [
	\Statamic\Events\EntrySaved::class => [
		\App\Listeners\CreateSocialImageNotification::class,
	],
];
```

I only want the image to be created if the changes are made in production and when the entry is an article. I have more types of collections but they don't need a social image.

```php
<?php

namespace App\Listeners;

use App\Actions\CreateSocialImageAction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Statamic\Events\EntrySaved;

class CreateSocialImageNotification implements ShouldQueue
{
    public function handle(EntrySaved $event)
    {
        if (! app()->environment('production')) {
            return;
        }

        if (! $this->isArticle($event->entry)) {
            return;
        }

        (new CreateSocialImageAction())($event->entry->slug);
    }

    protected function isArticle($entry): bool
    {
        return $entry->collection->handle === 'articles';
    }
}
```

The action should return early if the article is a draft.

It should also stop if we already have an up-to-date image.

Only the title and publish date are used in the template. These are stored on the entry and when the action is called are checked against the new title and date. If they are different a new image is generated.

```php
<?php

namespace App\Actions;

use Facades\App\Services\Statamic;
use Illuminate\Support\Facades\Storage;
use Statamic\Entries\Entry;
use Wnx\SidecarBrowsershot\BrowsershotLambda;

class CreateSocialImageAction
{
    public function __invoke($slug): void
    {
        $article = Statamic::getArticleBySlug($slug);

        if ($this->isDraft($article)) {
            return;
        }

        if ($this->hasSocialImage($article)) {
            return;
        }

        $screenshot = BrowsershotLambda::url(route('social-image', $slug))
                    ->setScreenshotType('jpeg', 100)
                    ->deviceScaleFactor(2)
                    ->windowSize(1200, 630)
                    ->screenshot();

        Storage::disk('s3')->put("/img/social/{$slug}.jpeg", $screenshot);

        $article
            ->set('social_image_title', $article->title)
            ->set('social_image_publish_date', $article->publish_date->toDateString())
            ->saveQuietly();
    }

    public function isDraft(Entry $article): bool
    {
        return ! $article->published();
    }

    public function hasSocialImage(Entry $article): bool
    {
        return $article->social_image_title === $article->title &&
            $article->social_image_publish_date === $article->publish_date->toDateString();
    }
}
```

The article is saved 'quietly' in the end. This means no events are dispatched. If we didn't do this we would enter an unbreakable loop of `EntrySaved` events which call the `CreateSocialImageAction` action which saves the event again.

You can view [this website's source code](https://github.com/yoeriboven/website) for a deeper look.

## Validating your tags
The last thing you need to do is validated whether your meta tags work correctly. Twitter offers a [card validator](https://cards-dev.twitter.com/validator) which can help you with that.

## In closing
I hope this article helped you create your social images.

Follow me [on Twitter](https://www.twitter.com/yoeriboven) to see when I publish a new post.
