<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class citataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author'=>'required|min:3',
            'text'=>'required|min:10|max:255|unique',
            'tags'=>'required|min:5'
        ];
    }
}
