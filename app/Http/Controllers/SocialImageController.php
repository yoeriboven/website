<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class SocialImageController
{
    public function __invoke(string $articleSlug)
    {
        if (! method_exists($this, Str::camel($articleSlug))) {
            abort(404);
        }

        $article = $this->{Str::camel($articleSlug)}();

        return view('social_image', compact('article'));
    }

    private function automateYourPhpSecurityUpdates() {
        $article = new \stdClass();
        $article->title = 'Automate your PHP security updates';
        $article->meta_description = 'Use GitHub Actions and Laravel Health to automatically patch PHP security vulnerabilities.';
        $article->slug = 'automate-your-php-security-updates';
        $article->publish_date = Carbon::parse('2026-05-28');
        $article->published = true;

        return $article;
    }

    private function increaseTheTimeoutOfLaravelHerd() {
        $article = new \stdClass();
        $article->title = 'Increase the timeout of Laravel Herd';
        $article->meta_description = "Long running requests will cause PHP to timeout. Fix it by changing some settings.";
        $article->slug = 'increase-the-timeout-of-laravel-herd';
        $article->publish_date = Carbon::parse('2024-02-22');
        $article->published = true;

        return $article;
    }

    private function increaseTheTimeoutOfLaravelValet() {
        $article = new \stdClass();
        $article->title = 'Increase the timeout of Laravel Valet';
        $article->meta_description = "Long running requests will cause PHP to timeout. Fix it by changing some settings.";
        $article->slug = 'increase-the-timeout-of-laravel-valet';
        $article->publish_date = Carbon::parse('2023-07-07');
        $article->published = true;

        return $article;
    }

    private function howIMadeMyBlogMultiLingual() {
        $article = new \stdClass();
        $article->title = 'How I made my blog multi-lingual';
        $article->meta_description = "I'm a freelance Laravel developer from The Netherlands. This means I've got both Dutch and English speaking customers. Dutch people generally understand English well, but it's always more comfortable to read in your own language.";
        $article->slug = 'how-i-made-my-blog-multi-lingual';
        $article->publish_date = Carbon::parse('2022-07-06');
        $article->published = true;

        return $article;
    }

    private function buildingSocialImagesWithBrowsershotAndAws() {
        $article = new \stdClass();
        $article->title = 'Building social images with Browsershot and AWS';
        $article->meta_description = 'Creating social images for your website is super simple using Browsershot and AWS Lambda.';
        $article->slug = 'building-social-images-with-browsershot-and-aws';
        $article->publish_date = Carbon::parse('2022-06-17');
        $article->published = true;

        return $article;
    }

    private function loggingToTheDatabaseWithLaravel() {
        $article = new \stdClass();
        $article->title = 'Logging to the database with Laravel';
        $article->meta_description = "Laravel doesn't come with a database driver for logging so I built one and packaged it up.";
        $article->slug = 'logging-to-the-database-with-laravel';
        $article->publish_date = Carbon::parse('2022-06-07');
        $article->published = true;

        return $article;
    }

    private function testingYourStatamicImplementation() {
        $article = new \stdClass();
        $article->title = 'Testing your Statamic implementation';
        $article->meta_description = "It can be unclear how to write Statamic tests. Here's a trait I wrote that makes it easy to test your Statamic implementation.";
        $article->slug = 'testing-your-statamic-implementation';
        $article->publish_date = Carbon::parse('2022-06-03');
        $article->published = true;

        return $article;
    }

    private function aBetterUxForLaravelCashier() {
        $article = new \stdClass();
        $article->title = 'A better UX for Laravel Cashier';
        $article->meta_description = "Laravel Cashier doesn't have a great UX out of the box. Using Laravel Livewire we're going to give your users a great experience!";
        $article->slug = 'a-better-ux-for-laravel-cashier';
        $article->publish_date = Carbon::parse('2022-05-26');
        $article->published = true;

        return $article;
    }
}
