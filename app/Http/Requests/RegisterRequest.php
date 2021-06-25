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
            'txtFirstName' => 'bail|required|alpha|max:50',
            'txtLastName' => 'bail|required|alpha|max:100',
            'txtUserName' => 'bail|required|max:100',
            'txtEmail' => 'bail|required|email',
            'txtAccountPass' => 'bail|required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
            'txtAccountPassRepeat' => 'bail|required|same:txtAccountPass',
        ];
    }

    public function messages()
    {
        return [
            'txtFirstName.required' => 'First name required!',
            'txtFirstName.alpha' => 'First name must be alphabet!',
            'txtFirstName.max' => 'First name must be less than 50 characters!',
            'txtLastName.required' => 'Last name required!',
            'txtLastName.alpha' => 'Last name must be alphabet!',
            'txtLastName.max' => 'Last name must be less than 100 characters!',
            'txtUserName.required' => 'Username required',
            'txtUserName.max' => 'Username must be less than 100 characters!',
            'txtEmail.required' => 'Email required!',
            'txtEmail.email' => 'Incorrect email!',
            'txtAccountPass.required' => 'Password required!',
            'txtAccountPass.min' => 'Password must be greater than 8 character!',
            'txtAccountPass.regex' => 'Password must be at least one uppercase letter, one lowercase letter and one number',
            'txtAccountPassRepeat.required' => 'Password required!',
            'txtAccountPassRepeat.same' => 'Password must be the same!',
        ];
    }
}
