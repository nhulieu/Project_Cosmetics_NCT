<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstName' => 'bail|required|alpha|max:50',
            'lastName' => 'bail|required|alpha|max:100',
            'username' => 'bail|required|max:100',
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
            'confirmPassword' => 'bail|required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'firstName.required' => 'First name required!',
            'firstName.alpha' => 'First name must be alphabet!',
            'firstName.max' => 'First name must be less than 50 characters!',
            'lastName.required' => 'Last name required!',
            'lastName.alpha' => 'Last name must be alphabet!',
            'lastName.max' => 'Last name must be less than 100 characters!',
            'username.required' => 'Username required',
            'username.max' => 'Username must be less than 100 characters!',
            'email.required' => 'Email required!',
            'email.email' => 'Incorrect email!',
            'password.required' => 'Password required!',
            'password.min' => 'Password must be greater than 8 character!',
            'password.regex' => 'Password must be at least one uppercase letter, one lowercase letter and one number',
            'confirmPassword.required' => 'Password required!',
            'confirmPassword.same' => 'Password must be the same!',
        ];
    }
}
