<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Locale;

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
