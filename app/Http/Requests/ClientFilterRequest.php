<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientFilterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'filters.*' => 'string',
        ];
    }
}

