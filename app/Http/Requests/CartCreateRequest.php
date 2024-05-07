<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|integer|exists:products,id',
            'count' => 'integer|min:0|max:10'
        ];
    }
}
