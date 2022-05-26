<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChangeLanguageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('/', HomeController::class)->name('home');
Route::get('blog', BlogController::class)->name('blog');
Route::get('blog/{article}', ArticleController::class)->name('article');
Route::view('blog/social-image/{article}', 'social_image')->name('social-image');

Route::post('language/{language}', ChangeLanguageController::class)
    ->whereIn('language', ['en', 'nl'])
    ->name('language-change');

Route::get('contact-me', [ContactController::class, 'show'])->name('contact');
Route::post('contact-me', [ContactController::class, 'store'])
    ->middleware(ProtectAgainstSpam::class)
    ->name('contact.store');

