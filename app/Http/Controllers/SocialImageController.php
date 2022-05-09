<?php

namespace App\Http\Controllers;

use Facades\App\Services\Statamic;

class SocialImageController
{
    public function __invoke($slug)
    {
        $article = Statamic::getArticleBySlug($slug);

        abort_if(is_null($article), 404);

        return view('social_image', compact('article'));
    }
}
