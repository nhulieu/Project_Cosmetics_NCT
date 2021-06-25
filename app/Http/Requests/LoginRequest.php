<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'txtLoginUser' => 'required',
            'txtLoginPassword' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtLoginUser.required' => 'Email can not blank!',
            'txtLoginPassword.required' => 'Password can not blank!'
        ];
    }
}
