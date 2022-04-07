<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Statamic\Facades\Entry;

class BlogController
{
    public function __invoke($slug)
    {
        $articles = Entry::query()
            ->select(['id', 'title', 'slug', 'date'])
            ->where('collection', 'articles')
            ->paginate(10);

        return Inertia::render('Blog', [
            'articles' => $articles
        ]);
    }
}
