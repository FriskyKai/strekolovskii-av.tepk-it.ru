<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShiftUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'start' => 'required|date',
            'end' => 'required|date',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
