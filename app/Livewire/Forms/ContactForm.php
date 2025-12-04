<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactForm extends Form
{
    public $contactId, $first_name, $last_name, $email, $phone, $subject, $message;
    public $search = '';
    public $rowsPerPage = 20;

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:100',
            'phone'      => 'required|regex:/^(?:\+?88)?01[3-9]\d{8}$/',
            'subject'    => 'required|string|max:100',
            'message'    => 'required|string|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Please enter your first name.',
            'first_name.string'   => 'First name must be a valid string.',
            'first_name.max'      => 'First name cannot exceed 100 characters.',

            'last_name.required'  => 'Please enter your last name.',
            'last_name.string'    => 'Last name must be a valid string.',
            'last_name.max'       => 'Last name cannot exceed 100 characters.',

            'email.required'      => 'Please enter your email address.',
            'email.email'         => 'Please enter a valid email address.',
            'email.max'           => 'Email cannot exceed 100 characters.',

            'phone.required'      => 'Please enter your phone number.',
            'phone.regex'         => 'Only Bangladeshi numbers are allowed.',

            'subject.required'    => 'Please enter the subject.',
            'subject.string'      => 'Subject must be a valid string.',
            'subject.max'         => 'Subject cannot exceed 100 characters.',

            'message.required'    => 'Please enter your message.',
            'message.string'      => 'Message must be text.',
            'message.max'         => 'Message cannot exceed 2000 characters.',
        ];
    }
}
