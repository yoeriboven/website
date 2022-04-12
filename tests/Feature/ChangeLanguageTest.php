<?php

namespace Tests\Feature;

use Tests\TestCase;

class ChangeLanguageTest extends TestCase
{
    /** @test */
    public function it_can_visit_a_url_and_explicitly_set_the_language_with_a_cookie()
    {
        $this->post('language/nl')->assertCookie('language', 'nl');
    }

    /** @test */
    public function it_only_allows_english_and_dutch()
    {
        $this->post('language/nl')->assertSuccessful();
        $this->post('language/en')->assertSuccessful();

        $this->post('language/de')->assertNotFound();
    }
}
