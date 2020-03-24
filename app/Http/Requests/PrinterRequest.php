<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrinterRequest extends FormRequest
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
            'name_printer'  => 'required',
            'brand_printer' => 'required|max:60',
            'price_printer' => 'required',
            'image_printer' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name_printer.required' => 'Nama Printer Wajib Di isi ',
            'brand_printer.max' => 'Merk Printer tidak boleh lebih dari 60 huruf ',
            'price_printer.required' => 'Harga Printer Wajib Di isi ',
            'image_printer.required' => 'Gambar Wajib Di isi '
        ];
    }
}
