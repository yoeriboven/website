<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'        => 'required',
            'email'       => 'required|email',
            'description' => 'required|min:10',
        ];
    }
}
