<?php

namespace App\Http\Controllers;

use Facades\App\Services\Statamic;
use Inertia\Inertia;

class ArticleController
{
    private array $staticArticles = [
        'nieuwe-slug' => 'StaticArticles/AutomatedComposerSecurity',
    ];

    public function __invoke(string $articleSlug)
    {
        $article = Statamic::getArticleBySlug($articleSlug);

        if ($article === null) {
            if (! array_key_exists($articleSlug, $this->staticArticles)) {
                abort(404);
            }

            return Inertia::render($this->staticArticles[$articleSlug]);
        }

        abort_if(! $article->published && ! auth()->user(), 403);

        return Inertia::render('Article', [
            'article' => $article,
        ]);
    }
}
