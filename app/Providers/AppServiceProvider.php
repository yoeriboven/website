<?php

namespace App\Providers;

use Facades\App\Services\Statamic;
use Illuminate\Support\ServiceProvider;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Assert as PHPUnit;
use Statamic\Facades\Markdown;
use Torchlight\Commonmark\V2\TorchlightExtension;

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
    }

    protected function registerMacros(): void
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

    protected function registerMarkdownExtensions(): void
    {
        Markdown::addExtension(function () {
            return new TorchlightExtension;
        });
    }
}
