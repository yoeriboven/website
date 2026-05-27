<?php

namespace App\Http\Controllers;

use Facades\App\Services\Statamic;
use Inertia\Inertia;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Torchlight\Commonmark\V2\TorchlightExtension;

class ArticleController
{
    public function __invoke(string $articleSlug)
    {
        $article = Statamic::getArticleBySlug($articleSlug);

        if ($article === null) {
            if (! method_exists($this, Str::camel($articleSlug))) {
                abort(404);
            }

            $article = $this->{Str::camel($articleSlug)}();
        }

        return Inertia::render('Article', [
            'article' => (array) $article,
        ]);
    }

    private function nieuweSlug() {
        $article = new \stdClass();
        $article->title = 'Random titl2e';
        $article->meta_description = 'Random meta description';
        $article->slug = 'nieuwe-slug';
        $article->publish_date = Carbon::parse('2022-07-06');
        $article->published = true;
        $article->content = Str::markdown(
            file_get_contents(resource_path('markdown/nieuwe-slug.md')),
            extensions: [new TorchlightExtension()]);

        return $article;
    }
}
