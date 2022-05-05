<?php

namespace App\Http\Controllers;

use Facades\App\Services\Statamic;
use Inertia\Inertia;

class ArticleController
{
    public function __invoke($slug)
    {
        $article = Statamic::getArticleBySlug($slug);

        abort_if(is_null($article), 404);

        abort_if(! $article->published && ! auth()->user(), 403);

        return Inertia::render('Article', [
            'article' => $article,
        ]);
    }
}
