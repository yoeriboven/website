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

    private function automateYourPhpSecurityUpdates() {
        $article = new \stdClass();
        $article->title = 'Automate your PHP security updates';
        $article->meta_description = 'Using Github Actions we can ';
        $article->slug = 'automate-your-php-security-updates';
        $article->publish_date = Carbon::parse('2026-05-28');
        $article->published = true;
        $article->content = Str::markdown(
            file_get_contents(resource_path('markdown/automate-your-php-security-updates.md')),
            extensions: [new TorchlightExtension()]);

        return $article;
    }
}
