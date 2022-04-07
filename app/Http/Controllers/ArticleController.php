<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Statamic\Facades\Entry;

class ArticleController
{
    public function __invoke($slug)
    {
        $article = Entry::query()
            ->select(['id', 'title', 'content', 'date'])
            ->where('slug', $slug)
            ->first();

        abort_if(is_null($article), 404);

        return Inertia::render('Article', [
            'article' => $article,
        ]);
    }
}
