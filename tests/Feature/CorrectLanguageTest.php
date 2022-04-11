<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\App;

class CorrectLanguageTest extends TestCase
{
    /** @test */
    public function it_has_a_default_language_of_english()
    {
        $this->assertTrue(App::isLocale('en'));
    }

    /** @test */
    public function it_can_be_changed_to_dutch()
    {
        App::setLocale('en');

        $this->post('language/nl');

        $this->assertTrue(App::isLocale('nl'));
    }

    /** @test */
    public function it_uses_the_header_language()
    {
        // use cookie
        // use header
        // use default
    }

    /** @test */
    public function it_only_allows_english_and_dutch()
    {
        $this->post('language/de')->assertNotFound();
    }
}
