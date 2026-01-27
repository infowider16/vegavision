<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'current_password' => ['required', 'current_password'],
            'new_password' => [
                'required',
                'string',
                'min:6',
                'max:128',
            ],
            'confirm_password' => ['required', 'same:new_password'],
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.current_password' => 'Your current password is incorrect.',
            'new_password.regex' => 'Password must include uppercase, lowercase, number, and special character.',
            'new_password.min' => 'Password must be at least 8 characters.',
            'new_password.max' => 'Password may not exceed 128 characters.',
            'confirm_password.same' => 'Confirm password must match the new password.',
            'confirm_password.required' => 'Please confirm your new password.',
        ];
    }
}
