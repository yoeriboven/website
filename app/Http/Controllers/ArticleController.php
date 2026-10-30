<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Repositories\ArticleRepository;

class ArticleController
{
    public function __invoke(string $articleSlug, ArticleRepository $articleRepository)
    {
        $article = $articleRepository->getBySlug($articleSlug);

        return Inertia::render('Article', [
            'article' => $article,
        ]);
    }
}
