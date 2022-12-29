<?php

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
            'content' => ['required'],
            'description' => ['required'],
            'meta_title' => ['max:255'],
            'meta_desc' => ['max:255'],
            'meta_keyword' => ['max:255'],
        ];
    }
}
