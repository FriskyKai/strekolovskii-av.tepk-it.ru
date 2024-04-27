<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoStoreRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'photos.*' => 'required|file|max:2048|mimes:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'photos.*.required' => 'Each file is required.',
            'photos.*.file' => 'Each file must be a valid file.',
            'photos.*.max' => 'Each file may not be greater than 2048 kilobytes',
            'photos.*.mimes' => 'Each file must be of type: jpeg, jpg, png.'
        ];
    }
}
