<?php

namespace App\Http\Controllers;

use Facades\App\Services\Statamic;
use Inertia\Inertia;

class HomeController
{
    public function __invoke()
    {
        $projects = Statamic::getAllProjects();
        $articles = Statamic::getLatestArticles(10);

        return Inertia::render('Home', [
            'projects' => $projects,
            'articles' => $articles,
        ]);
    }
}
