<?php

use Facades\App\Services\Statamic;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Mockery\MockInterface;
use Statamic\Entries\Entry;
use Statamic\Facades\Form as FormFacade;
use Statamic\Forms\Form;
use Statamic\Forms\Submission;

it('can store a form submission', function () {
    $mockedSubmission = $this->mock(Submission::class, function (MockInterface $mock) {
        $mock->shouldReceive('data')->once()->with([
            'name'        => 'Yoeri Boven',
            'email'       => 'example@yoeri.me',
            'description' => "We're looking for someone to build a SaaS application.",
        ]);

        $mock->shouldReceive('save')->once()->andReturn(true);
    });

    $mockedForm = $this->mock(Form::class, function (MockInterface $mock) use ($mockedSubmission) {
        $mock->shouldReceive('makeSubmission')->once()->andReturn($mockedSubmission);
    });

    $mockedCollection = $this->mock(Collection::class, function (MockInterface $mock) use ($mockedForm) {
        $mock->shouldReceive('first')->once()->andReturn($mockedForm);
    });

    FormFacade::shouldReceive('all')->once()->andReturn($mockedCollection);

    Statamic::storeContactSubmission([
        'name'        => 'Yoeri Boven',
        'email'       => 'example@yoeri.me',
        'description' => "We're looking for someone to build a SaaS application.",
    ]);
});

it('gets published posts for guests', function () {
    $this->createArticle(title: 'A published post', published: true);

    $article = Statamic::getLatestArticles()->items()[0];

    expect($article->title)->toEqual('A published post');
});

it('gets published posts for admins', function () {
    $this->loginStatamicUser();

    $this->createArticle(title: 'A published post', published: true);

    $article = Statamic::getLatestArticles()->items()[0];

    expect($article->title)->toEqual('A published post');
});

it('doesnt get drafts for guests', function () {
    $this->createArticle(title: 'A draft post', published: false);

    $article = Statamic::getLatestArticles()->first();

    $this->assertNotEquals('A draft post', $article?->title);
});

it('gets drafts for admin', function () {
    $this->loginStatamicUser();

    $this->createArticle(title: 'A draft post', published: false);

    $article = Statamic::getLatestArticles()->items()[0];

    expect($article->title)->toEqual('A draft post');
});

it('returns the article by slug', function () {
    $this->createArticle(title: 'A draft post', published: false);

    $article = Statamic::getArticleBySlug(Str::slug('A draft post'));

    expect($article->title)->toEqual('A draft post');
});

it('only shows published in the past posts to guests', function () {
    $this->createArticle(title: 'A published post in the future', published: true, publish_date: today()->addDay());

    $containsFuturePost = Statamic::getLatestArticles()->contains(function (Entry $article) {
        return $article->title === 'A published post in the future';
    });

    expect($containsFuturePost)->toBeFalse();

    $this->createArticle(title: 'A published post in the past', published: true, publish_date: today()->subDay());

    $containsPastPost = Statamic::getLatestArticles()->contains(function (Entry $article) {
        return $article->title === 'A published post in the past';
    });

    expect($containsPastPost)->toBeTrue();
});

it('shows published posts to admins regardless of the published date', function () {
    $this->loginStatamicUser();

    $this->createArticle(title: 'A published post in the future', published: true, publish_date: today()->addDay());

    $containsFuturePost = Statamic::getLatestArticles()->contains(function (Entry $article) {
        return $article->title === 'A published post in the future';
    });

    expect($containsFuturePost)->toBeTrue();

    $this->createArticle(title: 'A published post in the past', published: true, publish_date: today()->subDay());

    $containsPastPost = Statamic::getLatestArticles()->contains(function (Entry $article) {
        return $article->title === 'A published post in the past';
    });

    expect($containsPastPost)->toBeTrue();
});
