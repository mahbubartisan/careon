<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'signup_name'     => ['required', 'string', 'max:255'],
            'signup_phone'    => ['required', 'max:20', 'unique:users,phone'],
            'signup_email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'signup_gender'   => ['required'],
            'signup_division' => ['required'],
            'signup_password' => ['required', 'string', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'signup_name.required'     => 'Full name is required.',
            'signup_name.string'       => 'Full name must be a valid text.',
            'signup_name.max'          => 'Full name cannot be longer than 255 characters.',

            'signup_phone.required'    => 'Phone number is required.',
            'signup_phone.string'      => 'Phone number must be valid.',
            'signup_phone.max'         => 'Phone number cannot be longer than 20 characters.',
            'signup_phone.unique'      => 'This phone number is already registered.',

            'signup_email.required'    => 'Email is required.',
            'signup_email.string'      => 'Email must be valid text.',
            'signup_email.email'       => 'Please enter a valid email address.',
            'signup_email.max'         => 'Email cannot be longer than 255 characters.',
            'signup_email.unique'      => 'This email is already registered.',

            'signup_gender.required'   => 'Gender is required.',
            'signup_division.required' => 'Division is required.',

            'signup_password.required' => 'Password is required.',
            'signup_password.string'   => 'Password must be valid text.',
            'signup_password.min'      => 'Password must be at least 6 characters long.',
        ];
    }
}
