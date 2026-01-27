<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow access; adjust as needed for auth checks
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
        'email' => 'required|email:rfc,dns|max:255',

            'profile_image' => 'nullable|image|max:5120', // required + 5MB max
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'profile_image.required' => 'Profile image is required.',
            'profile_image.image' => 'The uploaded file must be an image.',
            'profile_image.max' => 'Profile image must be less than 5MB.',
        ];
    }
}
