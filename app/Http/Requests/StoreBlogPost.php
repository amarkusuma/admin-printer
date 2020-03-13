<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Captcha;

class StoreBlogPost extends FormRequest
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
            'name'  => 'required|max:40',
            'email' => 'required|max:50|email',
            'password' => 'required|min:6',
            'g-recaptcha-response' => new Captcha(),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Kamu Belom D Isi',
            'email.required' => 'Email Wajib D Isi ya ',
            'password.min' => 'password kamu tidak Boleh kurang dari 5 ya',
            'g-recaptcha-response' => 'Checkbox reCaptcha'
        ];
    }
}
