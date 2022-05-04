<?php

namespace App\Http\Controllers;

use Facades\App\Services\Statamic;
use App\Http\Requests\ContactRequest;

class ContactController
{
    public function store(ContactRequest $request)
    {
        Statamic::storeContactSubmission($request->validated());

        return redirect(route('home'));
    }
}
