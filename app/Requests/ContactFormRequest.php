<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize()
    {
        // Allow all users to submit the form
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country_code' => 'required|string|max:5',
            'phone' => 'required|digits:10',
            'message' => 'required|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'organization.required' => 'Organization is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'country_code.required' => 'Country code is required.',
            'phone.required' => 'Phone number is required.',
            'phone.digits' => 'Phone number must be exactly 10 digits.',
            'message.required' => 'Message is required.',
        ];
    }
}
