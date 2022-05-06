<?php

namespace Tests\Integration\Services;

use Facades\App\Services\Statamic;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Mockery\MockInterface;
use Statamic\Facades\Form as FormFacade;
use Statamic\Forms\Form;
use Statamic\Forms\Submission;
use Tests\TestCase;

class StatamicTest extends TestCase
{
    /** @test */
    public function it_can_store_a_form_submission()
    {
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
    }

    /** @test */
    public function it_gets_published_posts_for_guests()
    {
        $this->createArticle(title: 'A published post', published: true);

        $article = Statamic::getLatestArticles()->items()[0];

        $this->assertEquals('A published post', $article->title);
    }

    /** @test */
    public function it_gets_published_posts_for_admins()
    {
        $this->loginStatamicUser();

        $this->createArticle(title: 'A published post', published: true);

        $article = Statamic::getLatestArticles()->items()[0];

        $this->assertEquals('A published post', $article->title);
    }

    /** @test */
    public function it_doesnt_get_drafts_for_guests()
    {
        $this->createArticle(title: 'A draft post', published: false);

        $article = optional(Statamic::getLatestArticles()->first());

        $this->assertNotEquals('A draft post', $article->title);
    }

    /** @test */
    public function it_gets_drafts_for_admin()
    {
        $this->loginStatamicUser();

        $this->createArticle(title: 'A draft post', published: false);

        $article = Statamic::getLatestArticles()->items()[0];

        $this->assertEquals('A draft post', $article->title);
    }

    /** @test */
    public function it_returns_the_article_by_slug()
    {
        $this->createArticle(title: 'A draft post', published: false);

        $article = Statamic::getArticleBySlug(Str::slug('A draft post'));

        $this->assertEquals('A draft post', $article->title);
    }
}
