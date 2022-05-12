<?php

namespace App\Http\Controllers;

use Facades\App\Services\Statamic;
use Inertia\Inertia;
use Statamic\Entries\Entry;

class ArticleController
{
    public function __invoke(Entry $article)
    {
        abort_if(! $article->published && ! auth()->user(), 403);

        return Inertia::render('Article', [
            'article' => $article,
        ]);
    }
}
