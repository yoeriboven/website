<?php

namespace Tests\Feature;

use App\Notifications\NewContactSubmission;
use Facades\App\Services\Statamic;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ContactTest extends TestCase
{
    protected array $validData = [
        'name'        => 'Yoeri Boven',
        'email'       => 'example@yoeri.me',
        'description' => "We're looking for someone to build a SaaS application.",
    ];

    protected function setUp(): void
    {
        parent::setUp();

        Notification::fake();
    }

    /** @test */
    public function it_stores_the_form_submission()
    {
        Statamic::shouldReceive('storeContactSubmission')->once()->with($this->validData);

        $this->post(route('contact.store'), $this->validData)
            ->assertRedirect();
    }

    /** @test */
    public function it_requires_all_fields()
    {
        $this->post(route('contact.store'), [
            'name'        => null,
            'email'       => null,
            'description' => null,
        ])->assertInvalid(['name', 'email', 'description']);
    }

    /** @test */
    public function it_requires_a_valid_email()
    {
        $this->post(route('contact.store'), [
            'email' => 'invalid_email',
        ])->assertInvalid(['email']);
    }

    /** @test */
    public function it_needs_a_description_of_at_least_10_characters()
    {
        $this->post(route('contact.store'), [
            'description' => 'nine_char',
        ])->assertInvalid(['description']);

        $this->post(route('contact.store'), [
            'description' => 'more than 10 characters',
        ])->assertValid(['descriptions']);
    }

    /** @test */
    public function it_sends_a_notification_when_the_form_is_submitted()
    {
        Statamic::shouldReceive('storeContactSubmission')->once();

        $this->post(route('contact.store'), $this->validData);

        Notification::assertSentOnDemand(NewContactSubmission::class, function ($notification) {
            return $notification->submission === $this->validData;
        });
    }

    /** @test */
    public function it_sends_an_email_when_the_form_is_submitted()
    {
        Statamic::shouldReceive('storeContactSubmission')->once();

        $this->post(route('contact.store'), $this->validData);

        Notification::assertSentOnDemand(NewContactSubmission::class, function ($notification, $channels, $notififiable) {
            return $notififiable->routes['mail'] === config('app.contact_email');
        });
    }

    /** @test */
    public function it_sends_a_telegram_message_when_the_form_is_submitted()
    {
        Statamic::shouldReceive('storeContactSubmission')->once();

        $this->post(route('contact.store'), $this->validData);

        Notification::assertSentOnDemand(NewContactSubmission::class, function ($notification, $channels, $notififiable) {
            return $notififiable->routes['telegram'] === config('services.telegram-bot-api.chat_id');
        });
    }
}
