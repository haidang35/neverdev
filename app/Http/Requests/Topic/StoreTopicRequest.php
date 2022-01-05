<?php

namespace App\Http\Requests\Topic;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicRequest extends FormRequest
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
            'name' => 'required',
            'desc' => 'string | nullable',
            'topics' => 'nullable',
            'thumbnail' => 'string | nullable',
            'meta_title' => 'string | nullable',
            'meta_desc' => 'string | nullable',
            'meta_key' => 'string | nullable',
        ];
    }
}
