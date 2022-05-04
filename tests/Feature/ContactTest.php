<?php

namespace Tests\Feature;

use Facades\App\Services\Statamic;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /** @test */
    public function it_stores_the_form_submission()
    {
        $this->withoutExceptionHandling();

        Statamic::shouldReceive('storeContactSubmission')->with([
            'name'        => 'Yoeri Boven',
            'email'       => 'example@yoeri.me',
            'description' => "We're looking for someone to build a SaaS application.",
        ]);

        $this->post(route('contact.store'), [
            'name'        => 'Yoeri Boven',
            'email'       => 'example@yoeri.me',
            'description' => "We're looking for someone to build a SaaS application.",
        ])->assertSuccessful();
    }
}
