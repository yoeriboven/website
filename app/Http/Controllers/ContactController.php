<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Statamic;

class ContactController
{
    public function store(Request $request, Statamic $statamic)
    {
        $statamic->storeContactSubmission([
            'name'        => $request->name,
            'email'       => $request->email,
            'description' => $request->description,
        ]);

        return redirect(route('home'));
    }
}
