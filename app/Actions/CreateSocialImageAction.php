<?php

namespace App\Actions;

use Illuminate\Support\Facades\Storage;
use Wnx\SidecarBrowsershot\BrowsershotLambda;

class CreateSocialImageAction
{
    public function __invoke($slug): void
    {
        $screenshot = BrowsershotLambda::url(route('social-image', $slug))
                    ->setScreenshotType('jpeg', 100)
                    ->deviceScaleFactor(2)
                    ->windowSize(1200, 630)
                    ->screenshot();

        Storage::disk('s3')->put("/img/social/{$slug}.jpeg", $screenshot);
    }
}
