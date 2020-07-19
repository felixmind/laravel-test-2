<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'bail|required|string',
            'last_name'  => 'bail|required|string',
        ];
    }
}