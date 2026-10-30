<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class BlogController
{
    public function __invoke()
    {
        return Inertia::render('Blog');
    }
}
