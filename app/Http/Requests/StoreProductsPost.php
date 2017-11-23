<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
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
            'nameproduct' => 'required|min:3|max:255|unique:product,name_pd',
            'desproduct' => 'required',
            'chooseCat' => 'required|numeric',
            'chooseSize' => 'required|numeric',
            'priceproduct' => 'required|numeric',
            'qtyproduct' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'nameproduct.required' => ':attribute khong duoc de trong',
            'nameproduct.min' => ':attribute khong nho hon :min ki tu',
            'nameproduct.max' => ':attribute khong lon hon :max ki tu',
            'nameproduct.unique' => ':attribute da ton tai ten san pham nay',
            'desproduct.required' => ':attribute khong duoc de trong',
            'chooseCat.required' => ':attribute khong duoc de trong',
            'chooseCat.numeric' => ':attribute phai nhap vao la so',
            'chooseSize.required' => ':attribute khong duoc de trong',
            'chooseSize.numeric' => ':attribute phai nhap vao la so',
            'priceproduct.required' => ':attribute khong duoc de trong',
            'priceproduct.numeric' => ':attribute phai nhap vao la so',
            'qtyproduct.required' => ':attribute khong duoc de trong',
            'qtyproduct.numeric' => ':attribute phai nhap vao la so',
        ];
    }
}
