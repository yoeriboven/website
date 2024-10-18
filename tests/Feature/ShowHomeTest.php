<?php

use Inertia\Testing\AssertableInertia as Assert;

it('lists the latest posts', function () {
    $this->createArticle('The First Article');
    $this->createArticle('The Second Article');
    $this->createArticle('The Third Article');

    $this->get(route('home'))
        ->assertSee('The First Article')
        ->assertSee('The Second Article')
        ->assertSee('The Third Article');
});

it('hides drafts from guests', function () {
    $this->createArticle(title: 'A draft post', published: false);

    $this->get(route('home'))
        ->assertInertia(function (Assert $page) {
            $page->component('Home')
                ->missing('articles.0.title', 'A draft post');
        });
});

it('shows drafts to admin', function () {
    $this->loginStatamicUser();

    $this->createArticle(title: 'A draft post', published: false);

    $this->get(route('home'))
        ->assertInertia(function (Assert $page) {
            $page->component('Home')
                ->where('articles.data.0.title', 'A draft post');
        });
});
