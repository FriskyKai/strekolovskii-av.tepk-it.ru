<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surname' => 'string|min:2|max:32',
            'name' => 'string|min:2|max:32',
            'email' => 'email|min:11|max:32|unique:users',
            'phone' => 'string|regex:/^8\d{3}\d{3}\d{2}\d{2}$/',
            'password' => 'string|min:6',
            'role_id' => 'integer|exists:roles,id'
        ];
    }
}
