<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    public function rules()
    {
        return [
            'name' => ['required','max:255'],
            'slug' => ['required','unique:courses,slug,' . $this->route('course'),'max:255'],
            'link' => ['max:255'],
            'price' => ['numeric','digits_between:1,17'],
            'old_price' => ['numeric','digits_between:1,17'],
            'content' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'meta_title' => ['max:255','nullable', 'string'],
            'meta_desc' => ['max:255','nullable', 'string'],
            'meta_keyword' => ['max:255','nullable', 'string'],
        ];
    }
}
