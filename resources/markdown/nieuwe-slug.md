I'm a freelance Laravel developer from The Netherlands. This means I've got both Dutch and English speaking customers. Dutch people generally understand English well, but it's always more comfortable to read in your own language.

For that reason I decided to make my blog multilingual.

The website should automatically use the visitor's browser's language. The exception to this is if the visitor has manualy changed the language to either Dutch or English. If no browser language can be found and the language is not explicitly set it should default to English.

So this is how it works:

1. Check if the visitor manually changed the language. If so, use that language.
2. If not, get the visitor's browser's language.
3. If it is also not set, default to english.

## Manually setting the language.
In the top right of this page you see a language switcher. It doesn't do much on article pages but try it out on [the homepage](https://www.yoeri.me/) and you will see the language changing.

The two buttons with the flag in it are sending a POST request to the following route.

```php
Route::post('language/{language}', ChangeLanguageController::class)
    ->whereIn('language', ['en', 'nl'])
    ->name('language-change');
```

The `language` parameter is validated by only allowing 'en' and 'nl'.

This triggers a simple controller that sets a cookie with the language as its value.

```php
class ChangeLanguageController
{
    public function __invoke($language)
    {
        Cookie::queue(
            Cookie::forever('language', $language)
        );

        return response()->noContent();
    }
}
```

The frontend then updates all text on the page. The next time a user enters the website it uses this language.

## Determining the language
To determine which language to use we will add a middleware to our 'web' routes.

```php
<?php

class SetLanguageMiddleware
{
    private Request $request;

    public function handle(Request $request, Closure $next)
    {
        $this->request = $request;

        if ($this->hasLanguageCookie()) {
            $this->setLanguageFromCookie();
        } else {
            $this->setLanguageFromBrowser();
        }

        return $next($request);
    }

    private function hasLanguageCookie()
    {
        return $this->isValid($this->request->cookie('language'));
    }

    private function setLanguageFromCookie()
    {
        App::setLocale($this->request->cookie('language'));
    }

    private function setLanguageFromBrowser()
    {
        $userLanguage = Locale::acceptFromHttp($this->request->header('accept-language'));
        $userLanguage = explode('_', $userLanguage)[0];

        if ($this->isValid($userLanguage)) {
            App::setLocale($userLanguage);
        }
    }

    private function isValid($value)
    {
        return in_array($value, ['en', 'nl']);
    }
}
```

As you can see the middleware checks if the language has explicitly been set with a cookie. If it is it will set the language using `App::setLocale()` and go to the next middleware.

If no cookie has been set it will try to get the language from the browser. Most browsers add an `accept-language` header to each request and we will use this to determine the language.

If the middleware reaches its end and no language has been set it will fallback to the default you set in your [config/app.php](https://github.com/yoeriboven/website/blob/2c1677ac582e979a3037a3399640317af936b155/config/app.php#L85).

## Updating text on the frontend
To update the text on the frontend I'm using the `xiCO2k/laravel-vue-i18n` package by [Francisco Madeira](https://twitter.com/xico2k). The code sending the POST request and changing the language is quite straightforward and can [be found here](https://github.com/yoeriboven/website/blob/5ac77b2beab9e6b69350a8e9066eb043fd749827/resources/js/Shared/Header.vue).

## In closing
I hope this article helps you when building a multi-lingual website.

For more articles and [Laravel tips](https://twitter.com/yoeriboven/status/1540393597283012608?s=20&t=ba9NPmp7ehROYRsHU5Aryg) you can follow me on Twitter [@yoeriboven](https://www.twitter.com/yoeriboven).
