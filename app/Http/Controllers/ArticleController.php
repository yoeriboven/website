<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Statamic\Facades\Entry;

class ArticleController
{
    public function __invoke($slug)
    {
        $article = Entry::query()
            ->select(['id', 'title', 'content', 'meta_description', 'publish_date'])
            ->where('slug', $slug)
            ->first();

        abort_if(is_null($article), 404);

        abort_if(! $article->published && ! auth()->user(), 403);

        return Inertia::render('Article', [
            'article' => $article,
        ]);
    }
}
