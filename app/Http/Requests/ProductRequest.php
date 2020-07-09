<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'  => 'required|unique:products',
            'brand_product' => 'required|max:20',
            'price_product' => 'required',
            'image_product' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama product Wajib Di isi ',
            'name.unique' => 'Nama product sudah  ada  ',
            'brand_product.max' => 'Merk product tidak boleh lebih dari 20 huruf ',
            'price_product.required' => 'Harga product Wajib Di isi ',
            'image_product.required' => 'Gambar Wajib Di isi '
        ];
    }
}
