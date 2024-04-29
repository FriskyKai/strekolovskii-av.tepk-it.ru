<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'status_id' => 'required|integer|exists:statuses,id',
            'receive_method_id' => 'required|integer|exists:receive_methods,id',
            'payment_type_id' => 'required|integer|exists:payment_types,id',
            'user_id' => 'required|integer|exists:users,id',
            'address_id' => 'required|integer|exists:addresses,id',
        ];
    }
}
