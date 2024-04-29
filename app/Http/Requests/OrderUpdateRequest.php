<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => 'date',
            'status_id' => 'integer|exists:statuses,id',
            'receive_method_id' => 'integer|exists:receive_methods,id',
            'payment_type_id' => 'integer|exists:payment_types,id',
            'user_id' => 'integer|exists:users,id',
            'address_id' => 'integer|exists:addresses,id',
        ];
    }
}
