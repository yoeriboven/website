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
            ray('Article is a draft.');

            return;
        }

        if ($this->hasSocialImage($article)) {
            ray('Has image already');

            return;
        }

        ray('No image yet.');

        $screenshot = BrowsershotLambda::url(route('social-image', $slug))
                    ->setScreenshotType('jpeg', 100)
                    ->deviceScaleFactor(2)
                    ->windowSize(1200, 630)
                    ->screenshot();

        Storage::disk('s3')->put("/img/social/{$slug}.jpeg", $screenshot);

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
