<?php

use App\Http\Middleware\SetLanguageMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

it('uses a cookie if it is set', function () {
    expect(App::isLocale('en'))->toBeTrue();

    $request = Request::create('/', 'GET', [], ['language' => 'nl']);

    (new SetLanguageMiddleware())->handle($request, fn () => new Response());

    expect(App::isLocale('nl'))->toBeTrue();
});

it('uses the browser language if no cookie is set', function () {
    expect(App::isLocale('en'))->toBeTrue();

    $request = Request::create('/', 'GET', [], [], [], [
        'HTTP_ACCEPT_LANGUAGE' => 'nl-NL,nl;q=0.9',
    ]);

    (new SetLanguageMiddleware())->handle($request, fn () => new Response());

    expect(App::isLocale('nl'))->toBeTrue();
});

it('has a default language of english', function () {
    expect(App::isLocale('en'))->toBeTrue();
});
