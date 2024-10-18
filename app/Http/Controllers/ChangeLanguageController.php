<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

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
