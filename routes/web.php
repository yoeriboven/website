<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Home')->name('home');

Route::inertia('contact-me', 'Contact')->name('contact');

Route::get('blog', function () {
    $articles = [
        [
            'id' => 1,
            'title' => 'Using Laravel pagination with VueJS',
            'date' => '3 May 2022'
        ],
        [
            'id' => 2,
            'title' => 'How I built social images for this site',
            'date' => '19 April 2022',
        ],
        [
            'id' => 3,
            'title' => 'Building a multi-lingual site in Laravel',
            'date' => '12 April 2022',
            ],
        [
            'id' => 4,
            'title' => 'Logging to the database',
            'date' => '27 March 2022',
            ],
        [
            'id' => 5,
            'title' => 'Throwing a party with your mom',
            'date' => '23 March 2022',
        ],
    ];

    return Inertia::render('Blog', [
        'articles' => $articles
    ]);
})->name('blog');
