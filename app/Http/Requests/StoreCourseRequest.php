<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required','max:255'],
            'slug' => ['required','unique:courses,slug','max:255'],
            'link' => ['max:255'],
            'price' => ['numeric','digits_between:1,17'],
            'old_price' => ['numeric','digits_between:1,17'],
            'content' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'meta_title' => ['max:255','nullable', 'string'],
            'meta_desc' => ['max:255','nullable', 'string'],
            'meta_keyword' => ['max:255','nullable', 'string'],
            'photo' => ['required','image','mimes:jpg,png,jpeg','max:2048']
        ];
    }
}
