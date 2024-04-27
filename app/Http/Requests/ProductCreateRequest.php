<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:64',
            'new' => 'required|boolean',
            'bestseller' => 'required|boolean',
            'price' => 'required|integer',
            'description' => 'required|string',
            'photo_id' => 'required|integer|exists:photos,id',
            'promotion_id' => 'required|integer|exists:promotions,id',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }
}
