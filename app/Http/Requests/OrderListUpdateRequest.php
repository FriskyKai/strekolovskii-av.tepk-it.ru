<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderListUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => 'integer|exists:orders,id',
            'product_id' => 'integer|exists:products,id',
            'count' => 'integer|min:1',
            'price' => 'integer',
            'total' => 'integer',
        ];
    }
}
