<?php

namespace App\Http\Controllers;

use Facades\App\Services\Statamic;
use Inertia\Inertia;

class BlogController
{
    public function __invoke()
    {
        return Inertia::render('Blog');
    }
}
