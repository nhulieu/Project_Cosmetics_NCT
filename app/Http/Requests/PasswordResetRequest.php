<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
            'password' => 'bail|required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
            'confirmPassword' => 'bail|required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Password required!',
            'password.min' => 'Password must be greater than 8 character!',
            'password.regex' => 'Password must be at least one uppercase letter, one lowercase letter and one number',
            'confirmPassword.required' => 'Password required!',
            'confirmPassword.same' => 'Password must be the same!',
        ];
    }
}
