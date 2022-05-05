<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Notifications\NewContactSubmission;
use Facades\App\Services\Statamic;
use Illuminate\Support\Facades\Notification;
use Inertia\Inertia;
use Spatie\Honeypot\Honeypot;

class ContactController
{
    public function show(Honeypot $honeypot)
    {
        return Inertia::render('Contact', [
            'honeypot' => $honeypot,
        ]);
    }

    public function store(ContactRequest $request)
    {
        Statamic::storeContactSubmission($request->validated());

        Notification::route('mail', config('app.contact_email'))
                ->route('telegram', config('services.telegram-bot-api.chat_id'))
                ->notify(new NewContactSubmission($request->validated()));

        return redirect(route('contact'))->with('success', 'Form submitted.');
    }
}
