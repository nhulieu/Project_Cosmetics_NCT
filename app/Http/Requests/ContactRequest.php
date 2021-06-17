<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'bail|required|email',
            'subject' => 'required',
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name required!',
            'email.required' => 'Email required!',
            'email.email' => 'Incorrect email!',
            'subject.required' => 'Subject required!',
            'message.required' => 'Message required!'
        ];
    }
}
