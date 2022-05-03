<?php

namespace App\Services;

use Statamic\Facades\Form;

class Statamic
{
    public function storeContactSubmission(array $data): void
    {
        $form = Form::all()->first();

        $submission = $form->makeSubmission();

        $submission->data($data);

        $submission->save();
    }
}
