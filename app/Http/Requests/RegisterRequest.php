<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surname' => 'required|string|min:2|max:32',
            'name' => 'required|string|min:2|max:32',
            'email' => 'required|email|min:11|max:32|unique:users',
            'phone' => 'required|string|regex:/^8\d{3}\d{3}\d{2}\d{2}$/',
            'password' => 'required|string|min:6',
        ];
    }
}
