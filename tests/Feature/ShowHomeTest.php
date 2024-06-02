<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ShowHomeTest extends TestCase
{
    /** @test */
    public function it_lists_the_latest_posts()
    {
        $this->createArticle('The First Article');
        $this->createArticle('The Second Article');
        $this->createArticle('The Third Article');

        $this->get(route('home'))
            ->assertSee('The First Article')
            ->assertSee('The Second Article')
            ->assertSee('The Third Article');
    }

    /** @test */
    public function it_hides_drafts_from_guests()
    {
        $this->createArticle(title: 'A draft post', published: false);

        $this->get(route('home'))
            ->assertInertia(function (Assert $page) {
                $page->component('Home')
                    ->missing('articles.0.title', 'A draft post');
            });
    }

    /** @test */
    public function it_shows_drafts_to_admin()
    {
        $this->loginStatamicUser();

        $this->createArticle(title: 'A draft post', published: false);

        $this->get(route('home'))
            ->assertInertia(function (Assert $page) {
                $page->component('Home')
                    ->where('articles.data.0.title', 'A draft post');
            });
    }
}
