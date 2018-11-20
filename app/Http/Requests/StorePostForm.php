<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostForm extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255', 
            'body' => 'required|string|max:20000',
            'category' => 'required|string|exists:categories,slug',
            'image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
            'tags'  => 'min:1|array|exists:tags,id'
        ];
    }
}
