<?php

namespace App\Providers;

use Facades\App\Services\Statamic;
use Illuminate\Support\ServiceProvider;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Assert as PHPUnit;
use Statamic\Facades\Markdown;
use Torchlight\Commonmark\V2\TorchlightExtension;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Schedule;
use Statamic\Jobs\HandleEntrySchedule;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMacros();
        $this->registerMarkdownExtensions();

        $this->app->booted(function () {
            $this->removeAndReRegisterStatamicSchedule();
        });

        Vite::prefetch(5);

    }

    private function registerMacros(): void
    {
        AssertableJson::macro('whereNot', function (string $key, string $expected) {
            $actual = $this->prop($key);

            PHPUnit::assertNotSame(
                $expected,
                $actual,
                sprintf('Inertia property [%s] should not match the expected value.', $this->dotPath($key))
            );
        });
    }

    private function registerMarkdownExtensions(): void
    {
        Markdown::addExtension(function () {
            return new TorchlightExtension;
        });
    }

    /**
     * Statamic registers a command to run every minute. It clogs up Nightwatch and is rarely used.
     * Change to use every 3 hours.
     */
    private function removeAndReRegisterStatamicSchedule(): void
    {
        collect(Schedule::events())
            ->firstWhere('description', HandleEntrySchedule::class)
            ->everyThreeHours();
    }
}
