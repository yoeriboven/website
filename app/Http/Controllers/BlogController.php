<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Statamic\Facades\Entry;

class BlogController
{
    public function __invoke()
    {
        $articles = Entry::query()
            ->select(['id', 'title', 'slug', 'date'])
            ->where('collection', 'articles')
            ->when(! auth()->user(), function ($query) {
                $query->where('published', 1);
            })
            ->orderBy('date', 'desc')
            ->paginate(10);

        return Inertia::render('Blog', [
            'articles' => $articles,
        ]);
    }
}
