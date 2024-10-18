<?php

use Inertia\Testing\AssertableInertia as Assert;

it('shows the article', function () {
    $article = $this->createArticle('A new post');

    $this->get(route('article', $article->slug()))
        ->assertSee('A new post');
});

it('rejects guests if article is draft', function () {
    $article = $this->createArticle(title: 'A draft post', published: false);

    $this->get(route('article', $article->slug()))
        ->assertForbidden();
});

it('returns 404 if the article is not found', function () {
    $this->get(route('article', 'article-does-not-exist'))
        ->assertNotFound();
});

it('shows the article to user if its a draft', function () {
    $this->loginStatamicUser();

    $article = $this->createArticle(title: 'A draft post', published: false);

    $this->get(route('article', $article->slug()))
        ->assertInertia(function (Assert $page) {
            $page->component('Article')
                ->where('article.title', 'A draft post');
        });
});
