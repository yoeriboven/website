<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Statamic\Facades\Entry;

Route::get('/', function () {
    $projects = Entry::query()
        ->select(['id', 'title', 'content', 'repo', 'link'])
        ->where('collection', 'projects')
        ->get();

    return Inertia::render('Home', [
        'projects' => $projects,
    ]);
})->name('home');

Route::inertia('contact-me', 'Contact')->name('contact');

Route::get('blog', function () {
//    $articles = [
//        [
//            'id' => 1,
//            'title' => 'Using Laravel pagination with VueJS',
//            'date' => '3 May 2022'
//        ],
//        [
//            'id' => 2,
//            'title' => 'How I built social images for this site',
//            'date' => '19 April 2022',
//        ],
//        [
//            'id' => 3,
//            'title' => 'Building a multi-lingual site in Laravel',
//            'date' => '12 April 2022',
//            ],
//        [
//            'id' => 4,
//            'title' => 'Logging to the database',
//            'date' => '27 March 222',
//            ],
//    ];

    $articles = Entry::query()
        ->select(['id', 'title', 'slug', 'date'])
        ->where('collection', 'articles')
        ->paginate(10);

    return Inertia::render('Blog', [
        'articles' => $articles
    ]);
})->name('blog');

Route::get('blog/{slug}', function($slug) {
    $article = Entry::query()
        ->select(['id', 'title', 'content', 'date'])
        ->where('slug', $slug)
        ->first();

    abort_if(is_null($article), 404);

    return Inertia::render('Article', [
        'article' => $article,
    ]);
})->name('article');
