<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use App\Data\Article;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use Torchlight\Commonmark\V2\TorchlightExtension;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;

class ArticleRepository
{
    public function getBySlug($slug): Article
    {
        if (! method_exists($this, Str::camel($slug))) {
            throw new ModelNotFoundException('Article not found');
        }

        return $this->{Str::camel($slug)}();
    }

    private function automateYourPhpSecurityUpdates(): Article
    {
        return new Article(
            title: 'Automate your PHP security updates',
            meta_description: 'Use GitHub Actions and Laravel Health to automatically patch PHP security vulnerabilities.',
            slug: 'automate-your-php-security-updates',
            publish_date: Carbon::parse('2026-05-28'),
            content: $this->renderMarkdown('automate-your-php-security-updates.md'),
        );
    }

    private function increaseTheTimeoutOfLaravelHerd(): Article
    {
        return new Article(
            title: 'Increase the timeout of Laravel Herd',
            meta_description: "Long running requests will cause PHP to timeout. Fix it by changing some settings.",
            slug: 'increase-the-timeout-of-laravel-herd',
            publish_date: Carbon::parse('2024-02-22'),
            content: $this->renderMarkdown('increase-the-timeout-of-laravel-herd.md'),
        );
    }

    private function increaseTheTimeoutOfLaravelValet(): Article
    {
        return new Article(
            title: 'Increase the timeout of Laravel Valet',
            meta_description: "Long running requests will cause PHP to timeout. Fix it by changing some settings.",
            slug: 'increase-the-timeout-of-laravel-valet',
            publish_date: Carbon::parse('2023-07-07'),
            content: $this->renderMarkdown('increase-the-timeout-of-laravel-valet.md'),
        );
    }

    private function howIMadeMyBlogMultiLingual(): Article
    {
        return new Article(
            title: 'How I made my blog multi-lingual',
            meta_description: "I'm a freelance Laravel developer from The Netherlands. This means I've got both Dutch and English speaking customers. Dutch people generally understand English well, but it's always more comfortable to read in your own language.",
            slug: 'how-i-made-my-blog-multi-lingual',
            publish_date: Carbon::parse('2022-07-06'),
            content: $this->renderMarkdown('how-i-made-my-blog-multi-lingual.md'),
        );
    }

    private function buildingSocialImagesWithBrowsershotAndAws(): Article
    {
        return new Article(
            title: 'Building social images with Browsershot and AWS',
            meta_description: 'Creating social images for your website is super simple using Browsershot and AWS Lambda.',
            slug: 'building-social-images-with-browsershot-and-aws',
            publish_date: Carbon::parse('2022-06-17'),
            content: $this->renderMarkdown('building-social-images-with-browsershot-and-aws.md'),
        );
    }

    private function loggingToTheDatabaseWithLaravel(): Article
    {
        return new Article(
            title: 'Logging to the database with Laravel',
            meta_description: "Laravel doesn't come with a database driver for logging so I built one and packaged it up.",
            slug: 'logging-to-the-database-with-laravel',
            publish_date: Carbon::parse('2022-06-07'),
            content: $this->renderMarkdown('logging-to-the-database-with-laravel.md'),
        );
    }

    private function testingYourStatamicImplementation(): Article
    {
        return new Article(
            title: 'Testing your Statamic implementation',
            meta_description: "It can be unclear how to write Statamic tests. Here's a trait I wrote that makes it easy to test your Statamic implementation.",
            slug: 'testing-your-statamic-implementation',
            publish_date: Carbon::parse('2022-06-03'),
            content: $this->renderMarkdown('testing-your-statamic-implementation.md'),
        );
    }

    private function aBetterUxForLaravelCashier(): Article
    {
        return new Article(
            title: 'A better UX for Laravel Cashier',
            meta_description: "Laravel Cashier doesn't have a great UX out of the box. Using Laravel Livewire we're going to give your users a great experience!",
            slug: 'a-better-ux-for-laravel-cashier',
            publish_date: Carbon::parse('2022-05-26'),
            content: $this->renderMarkdown('a-better-ux-for-laravel-cashier.md'),
        );
    }

    private function renderMarkdown(string $file): string
    {
        $markdown = file_get_contents(resource_path("markdown/{$file}"));

        $html = Str::markdown($markdown, options: [
            'external_link' => [
                'open_in_new_window' => true,
            ],
        ], extensions: [new TorchlightExtension(), new ExternalLinkExtension()]);

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
