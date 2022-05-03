<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChangeLanguageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', HomeController::class)->name('home');
Route::get('blog', BlogController::class)->name('blog');
Route::get('blog/{slug}', ArticleController::class)->name('article');

Route::post('language/{language}', ChangeLanguageController::class)
    ->whereIn('language', ['en', 'nl'])
    ->name('language-change');

Route::inertia('contact-me', 'Contact')->name('contact');
Route::post('contact-me', [ContactController::class, 'store'])->name('contact.store');
