<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlePhotoCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'article_id' => 'required|integer|exists:articles,id',
            'photo_id' => 'required|integer|exists:photos,id',
        ];
    }
}
