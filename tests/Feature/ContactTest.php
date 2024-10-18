<?php

use App\Notifications\NewContactSubmission;
use Facades\App\Services\Statamic;
use Illuminate\Support\Facades\Notification;

beforeEach(function () {
    Notification::fake();
});

function validData(): array {
    return [
        'name'        => 'Yoeri Boven',
        'email'       => 'example@yoeri.me',
        'description' => "We're looking for someone to build a SaaS application.",
    ];
}

it('stores the form submission', function () {
    Statamic::shouldReceive('storeContactSubmission')->once()->with(validData());

    $this->post(route('contact.store'), validData())
        ->assertRedirect();
});

it('requires all fields', function () {
    $this->post(route('contact.store'), [
        'name'        => null,
        'email'       => null,
        'description' => null,
    ])->assertInvalid(['name', 'email', 'description']);
});

it('requires a valid email', function () {
    $this->post(route('contact.store'), [
        'email' => 'invalid_email',
    ])->assertInvalid(['email']);
});

it('needs a description of at least 10 characters', function () {
    $this->post(route('contact.store'), [
        'description' => 'nine_char',
    ])->assertInvalid(['description']);

    $this->post(route('contact.store'), [
        'description' => 'more than 10 characters',
    ])->assertValid(['descriptions']);
});

it('sends a notification when the form is submitted', function () {
    Statamic::shouldReceive('storeContactSubmission')->once();

    $this->post(route('contact.store'), validData());

    Notification::assertSentOnDemand(NewContactSubmission::class, function ($notification) {
        return $notification->submission === validData();
    });
});

it('sends an email when the form is submitted', function () {
    Statamic::shouldReceive('storeContactSubmission')->once();

    $this->post(route('contact.store'), validData());

    Notification::assertSentOnDemand(NewContactSubmission::class, function ($notification, $channels, $notififiable) {
        return $notififiable->routes['mail'] === config('app.contact_email');
    });
});

it('sends a telegram message when the form is submitted', function () {
    Statamic::shouldReceive('storeContactSubmission')->once();

    $this->post(route('contact.store'), validData());

    Notification::assertSentOnDemand(NewContactSubmission::class, function ($notification, $channels, $notififiable) {
        return $notififiable->routes['telegram'] === config('services.telegram-bot-api.chat_id');
    });
});
