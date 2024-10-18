<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ChangeLanguageTest extends TestCase
{
    #[Test]
    public function it_can_visit_a_url_and_explicitly_set_the_language_with_a_cookie()
    {
        $this->post('language/nl')->assertCookie('language', 'nl');
    }

    #[Test]
    public function it_only_allows_english_and_dutch()
    {
//        $this->post('language/nl')->assertRedirect();
//        $this->post('language/en')->assertRedirect();

        $this->post('language/de')->assertNotFound();
    }
}
