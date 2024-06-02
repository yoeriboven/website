<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ShowArticleTest extends TestCase
{
    #[Test]
    public function it_shows_the_article()
    {
        $article = $this->createArticle('A new post');

        $this->get(route('article', $article->slug()))
            ->assertSee('A new post');
    }

    #[Test]
    public function it_rejects_guests_if_article_is_draft()
    {
        $article = $this->createArticle(title: 'A draft post', published: false);

        $this->get(route('article', $article->slug()))
            ->assertForbidden();
    }

    #[Test]
    public function it_returns_404_if_the_article_is_not_found()
    {
        $this->get(route('article', 'article-does-not-exist'))
            ->assertNotFound();
    }

    #[Test]
    public function it_shows_the_article_to_user_if_its_a_draft()
    {
        $this->loginStatamicUser();

        $article = $this->createArticle(title: 'A draft post', published: false);

        $this->get(route('article', $article->slug()))
            ->assertInertia(function (Assert $page) {
                $page->component('Article')
                    ->where('article.title', 'A draft post');
            });
    }
}
