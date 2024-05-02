<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|min:2|max:64|unique:products',
            'new' => 'boolean',
            'bestseller' => 'boolean',
            'price' => 'integer',
            'description' => 'string',
            'photo_id' => 'integer|exists:photos,id',
            'promotion_id' => 'integer|exists:promotions,id',
            'category_id' => 'integer|exists:categories,id',
        ];
    }
}
