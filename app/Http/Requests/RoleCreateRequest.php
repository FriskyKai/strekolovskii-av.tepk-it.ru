<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'required|string|max:16',
            'name' => 'required|string|max:32'
        ];
    }
}
