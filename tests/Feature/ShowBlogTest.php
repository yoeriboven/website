<?php

use Inertia\Testing\AssertableInertia as Assert;

it('lists the latest posts', function () {
    $this->createArticle('The First Article');
    $this->createArticle('The Second Article');
    $this->createArticle('The Third Article');

    $this->get(route('blog'))
        ->assertSee('The First Article')
        ->assertSee('The Second Article')
        ->assertSee('The Third Article');
});

it('shows published posts to guests', function () {
    $this->createArticle(title: 'A published post', published: true);

    $this->get(route('blog'))
        ->assertInertia(function (Assert $page) {
            $page->component('Blog')
                ->where('articles.data.0.title', 'A published post');
        });
});

it('shows published posts to admins', function () {
    $this->loginStatamicUser();

    $this->createArticle(title: 'A published post', published: true);

    $this->get(route('blog'))
        ->assertInertia(function (Assert $page) {
            $page->component('Blog')
                ->where('articles.data.0.title', 'A published post');
        });
});

it('hides drafts from guests', function () {
    $this->createArticle(title: 'A draft post', published: false);

    $this->get(route('blog'))
        ->assertInertia(function (Assert $page) {
            $page->component('Blog')
                ->missing('articles.data.0.title', 'A draft post');
        });
});

it('shows drafts to admin', function () {
    $this->loginStatamicUser();

    $this->createArticle(title: 'A draft post', published: false);

    $this->get(route('blog'))
        ->assertInertia(function (Assert $page) {
            $page->component('Blog')
                ->where('articles.data.0.title', 'A draft post');
        });
});
