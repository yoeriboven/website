<?php

namespace Tests\Integration\Http\Middleware;

use App\Http\Middleware\SetLanguageMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class SetLanguageMiddlewareTest extends TestCase
{
    #[Test]
    public function it_uses_a_cookie_if_it_is_set()
    {
        $this->assertTrue(App::isLocale('en'));

        $request = Request::create('/', 'GET', [], ['language' => 'nl']);

        (new SetLanguageMiddleware())->handle($request, fn () => new Response());

        $this->assertTrue(App::isLocale('nl'));
    }

    #[Test]
    public function it_uses_the_browser_language_if_no_cookie_is_set()
    {
        $this->assertTrue(App::isLocale('en'));

        $request = Request::create('/', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'nl-NL,nl;q=0.9',
        ]);

        (new SetLanguageMiddleware())->handle($request, fn () => new Response());

        $this->assertTrue(App::isLocale('nl'));
    }

    #[Test]
    public function it_has_a_default_language_of_english()
    {
        $this->assertTrue(App::isLocale('en'));
    }
}
