<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\App;
use Locale;

class SetLanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $this->setLanguage();

        return $next($request);
    }

    private function setLanguage() {
        if ($this->isValid(Cookie::get('language'))) {
            App::setLocale(Cookie::get('language'));

            return;
        }

        // No explicit language set, look for browser default

        $userLanguage = Locale::acceptFromHttp(request()->header('accept-language'));
        $userLanguage = explode('_', $userLanguage)[0];

        if ($this->isValid($userLanguage)) {
            App::setLocale($userLanguage);

            return;
        }
    }

    private function isValid($value) {
        return in_array($value, ['en', 'nl']);
    }
}
