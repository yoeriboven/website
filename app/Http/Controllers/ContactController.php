<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Facades\App\Services\Statamic;
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

        return redirect(route('home'));
    }
}
