<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Assert as PHPUnit;
use Illuminate\Support\Facades\Vite;

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
}
