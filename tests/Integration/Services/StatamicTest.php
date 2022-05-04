<?php

namespace Tests\Integration\Services;

use Facades\App\Services\Statamic;
use Illuminate\Support\Collection;
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
        $this->withoutExceptionHandling();

        $mockedSubmission = $this->mock(Submission::class, function (MockInterface $mock) {
            $mock->shouldReceive('data')->with([
                'name'        => 'Yoeri Boven',
                'email'       => 'example@yoeri.me',
                'description' => "We're looking for someone to build a SaaS application.",
            ]);

            $mock->shouldReceive('save')->andReturn(true);
        });

        $mockedForm = $this->mock(Form::class, function (MockInterface $mock) use ($mockedSubmission) {
            $mock->shouldReceive('makeSubmission')->andReturn($mockedSubmission);
        });

        $mockedCollection = $this->mock(Collection::class, function (MockInterface $mock) use ($mockedForm) {
            $mock->shouldReceive('first')->andReturn($mockedForm);
        });

        FormFacade::shouldReceive('all')->andReturn($mockedCollection);

        Statamic::storeContactSubmission([
            'name'        => 'Yoeri Boven',
            'email'       => 'example@yoeri.me',
            'description' => "We're looking for someone to build a SaaS application.",
        ]);
    }
}
