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
            ->get();

        return Inertia::render('Home', [
            'projects' => $projects,
        ]);
    }
}
