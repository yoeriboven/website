<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Str;
use Statamic\Facades\Entry;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, WithStatamicEntryFaking;

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->cleanupStatamicData();
    }

    public function loginStatamicUser(): void
    {
        $this->actingAs($this->makeStatamicUser());
    }

    public function createArticle(string $title, bool $published = true): \Statamic\Entries\Entry
    {
        return $this->makeEntry(function () use ($title, $published) {
            $slug = Str::slug($title);

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
}
