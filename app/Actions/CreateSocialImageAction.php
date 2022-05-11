<?php

namespace App\Actions;

use Facades\App\Services\Statamic;
use Statamic\Entries\Entry;
use Spatie\Browsershot\Browsershot;

class CreateSocialImageAction
{
    public function __invoke($slug): void
    {
        $article = Statamic::getArticleBySlug($slug);

        if ($this->isDraft($article)) {
            ray('Article is a draft.');

            return;
        }

        if ($this->hasSocialImage($article)) {
            ray('Has image already');

            return;
        }

        ray('No image yet.');

        Browsershot::url(route('social-image', $slug))
            ->setScreenshotType('jpeg', 100)
            ->deviceScaleFactor(2)
            ->windowSize(1200, 628)
            ->save(public_path('img/social/'.$slug.'.jpeg'));

        $article
            ->set('social_image_title', $article->title)
            ->saveQuietly();

        ray('Image created');
    }

    public function isDraft(Entry $article): bool
    {
        return ! $article->published();
    }

    public function hasSocialImage(Entry $article): bool
    {
        return $article->social_image_title === $article->title;
    }
}
