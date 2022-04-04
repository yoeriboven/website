<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('contact-me', function () {
    return view('contact');
})->name('contact');

Route::get('blog', function () {
    $articles = [
        [
            'title' => 'Using Laravel pagination with VueJS',
            'date' => '3 May 2022'
        ],
        [
            'title' => 'How I built social images for this site',
            'date' => '19 April 2022',
            ],
                [
                    'title' => 'Building a multi-lingual site in Laravel',
                    'date' => '12 April 2022',
                    ],
                [
                    'title' => 'Logging to the database',
                    'date' => '27 March 2022',
                    ],
                [
                    'title' => 'Throwing a party with your mom',
                    'date' => '23 March 2022',
                    ],
    ];

    return view('blog')->with('articles', $articles);
})->name('blog');
