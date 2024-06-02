<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ShowBlogTest extends TestCase
{
    #[Test]
    public function it_lists_the_latest_posts()
    {
        $this->createArticle('The First Article');
        $this->createArticle('The Second Article');
        $this->createArticle('The Third Article');

        $this->get(route('blog'))
            ->assertSee('The First Article')
            ->assertSee('The Second Article')
            ->assertSee('The Third Article');
    }

    #[Test]
    public function it_shows_published_posts_to_guests()
    {
        $this->createArticle(title: 'A published post', published: true);

        $this->get(route('blog'))
            ->assertInertia(function (Assert $page) {
                $page->component('Blog')
                    ->where('articles.data.0.title', 'A published post');
            });
    }

    #[Test]
    public function it_shows_published_posts_to_admins()
    {
        $this->loginStatamicUser();

        $this->createArticle(title: 'A published post', published: true);

        $this->get(route('blog'))
            ->assertInertia(function (Assert $page) {
                $page->component('Blog')
                    ->where('articles.data.0.title', 'A published post');
            });
    }

    #[Test]
    public function it_hides_drafts_from_guests()
    {
        $this->createArticle(title: 'A draft post', published: false);

        $this->get(route('blog'))
            ->assertInertia(function (Assert $page) {
                $page->component('Blog')
                    ->missing('articles.data.0.title', 'A draft post');
            });
    }

    #[Test]
    public function it_shows_drafts_to_admin()
    {
        $this->loginStatamicUser();

        $this->createArticle(title: 'A draft post', published: false);

        $this->get(route('blog'))
            ->assertInertia(function (Assert $page) {
                $page->component('Blog')
                    ->where('articles.data.0.title', 'A draft post');
            });
    }
}
