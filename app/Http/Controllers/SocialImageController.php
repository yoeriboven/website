<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;

class SocialImageController
{
    public function __invoke(string $articleSlug, ArticleRepository $articleRepository)
    {
        $article = $articleRepository->getBySlug($articleSlug);

        return view('social_image', compact('article'));
    }
}
