<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'status' => 'required | boolean',
            'title' => 'required | string',
            'thumbnail' => 'nullable | string',
            'topic_id' => 'required | int',
            'body' => 'required | string',
            'meta_title' => 'string', 
            'meta_desc' => 'string', 
            'meta_key' => 'string',
        ];
    }
}
