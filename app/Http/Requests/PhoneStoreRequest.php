<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone' => 'bail|required|digits:11',
        ];
    }
}
