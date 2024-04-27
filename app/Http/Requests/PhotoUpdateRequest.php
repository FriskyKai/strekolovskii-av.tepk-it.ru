<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'path' => [
                'required',
                'string',
                'regex:#^public/photos/[\w\d_]+\.(jpeg|jpg|png)$#',
            ],
        ];
    }

    public function messages()
    {
        return [
            'path.regex' => 'Некорректный формат пути. Путь должен быть в формате public/photos/фото.',
        ];
    }
}
