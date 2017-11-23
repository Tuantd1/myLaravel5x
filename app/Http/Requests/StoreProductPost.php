<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPost extends FormRequest
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
            'txtEmail' => 'required|min:3|max:255|unique:product,name_pd',
            'txtPass' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'txtEmail.required' => ':attribute is required',
            'txtEmail.max' => ':attribute nho hon :max ki tu',
            'txtEmail.min' => ':attribute lon hon :min ki tu',
            'txtPass.required'  => ':attribute is required',
            'txtEmail.unique' => ':attribute has already been taken.',
        ];
    }
}
