<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'bail|required|email',
        ];
    }
}
