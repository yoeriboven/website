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
        $article->meta_description = 'Use GitHub Actions and Laravel Health to automatically patch PHP security vulnerabilities.';
        $article->slug = 'automate-your-php-security-updates';
        $article->publish_date = Carbon::parse('2026-05-28');
        $article->published = true;
        $article->content = $this->renderMarkdown('automate-your-php-security-updates.md');

        return $article;
    }

    private function renderMarkdown(string $file): string
    {
        $markdown = file_get_contents(resource_path("markdown/{$file}"));

        $html = Str::markdown($markdown, extensions: [new TorchlightExtension()]);

        return $this->embedRawCodeBlocks($markdown, $html);
    }

    /**
     * Attach each fenced code block's raw source to its rendered <pre> as a
     * base64 data-raw attribute, so the frontend can offer a clean copy
     * without scraping Torchlight's highlighted (line-numbered) markup.
     */
    private function embedRawCodeBlocks(string $markdown, string $html): string
    {
        preg_match_all('/^```[^\n]*\n(.*?)\n```[ \t]*$/ms', $markdown, $matches);

        $blocks = $matches[1];
        $index = 0;

        return preg_replace_callback('/<pre\b/', function () use (&$index, $blocks) {
            $raw = $blocks[$index] ?? null;
            $index++;

            if ($raw === null) {
                return '<pre';
            }

            return '<pre data-raw="'.base64_encode($raw).'"';
        }, $html);
    }
}
