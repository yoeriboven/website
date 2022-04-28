<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Statamic\Facades\Entry;

class HomeController
{
    public function __invoke()
    {
        $projects = Entry::query()
            ->select(['id', 'title', 'content', 'repo', 'link'])
            ->where('collection', 'projects')
            ->orderBy('date', 'desc')
            ->get();

        $articles = Entry::query()
            ->select(['id', 'title', 'slug', 'excerpt', 'publish_date'])
            ->where('collection', 'articles')
            ->when(! auth()->user(), function ($query) {
                $query->where('published', 1);
            })
            ->orderBy('publish_date', 'desc')
            ->limit(10)
            ->get();

        return Inertia::render('Home', [
            'projects' => $projects,
            'articles' => $articles,
        ]);
    }
}
