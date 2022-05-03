<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Statamic\Facades\Form;

class ContactController
{
    public function store(Request $request)
    {
        $form = Form::all()->first();

        $submission = $form->makeSubmission();

        $submission->data([
            'name'        => $request->name,
            'email'       => $request->email,
            'description' => $request->description,
        ]);

        $submission->save();

        return redirect(route('home'));
    }
}
