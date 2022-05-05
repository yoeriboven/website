<?php

namespace App\Http\Controllers;

use Facades\App\Services\Statamic;
use Inertia\Inertia;

class BlogController
{
    public function __invoke()
    {
        $articles = Statamic::getLatestArticles(10);

        return Inertia::render('Blog', [
            'articles' => $articles,
        ]);
    }
}
