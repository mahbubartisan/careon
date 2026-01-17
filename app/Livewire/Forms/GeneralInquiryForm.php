<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class GeneralInquiryForm extends Form
{
    public $queryId, $name, $phone, $email, $subject, $message;
    public $search = ''; public $rowsPerPage = 20;
    public $query;

    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255',
            'phone'   => 'required|numeric',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Please enter your full name.',
            'name.string'      => 'Name must be a valid text.',
            'name.max'         => 'Name cannot exceed 255 characters.',

            'phone.required'   => 'Please provide your phone number.',
            'phone.numeric'    => 'Phone number must contain only numbers.',

            'email.required'   => 'Email address is required.',
            'email.email'      => 'Please enter a valid email address.',
            'email.max'        => 'Email cannot exceed 255 characters.',

            'subject.required' => 'Please enter a subject.',
            'subject.string'   => 'Subject must be valid text.',
            'subject.max'      => 'Subject cannot exceed 255 characters.',

            'message.required' => 'Please write your message.',
            'message.string'   => 'Message must be valid text.',
            'message.max'      => 'Message cannot exceed 1000 characters.',
        ];
    }
}
