<?php

namespace App\Http\Controllers;

use Facades\App\Services\Statamic;
use Statamic\Entries\Entry;

class SocialImageController
{
    public function __invoke(Entry $article)
    {
        return view('social_image', compact('article'));
    }
}
