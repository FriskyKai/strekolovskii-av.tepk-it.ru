<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'string|max:16',
            'name' => 'string|max:32'
        ];
    }
}
