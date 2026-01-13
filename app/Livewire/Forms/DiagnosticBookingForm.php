<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DiagnosticBookingForm extends Form
{
    public $patient_name, $phone, $email, $address, $patient_age, $gender, $collection_date, $collection_time_range, $notes;
    public $bookingFor = 'self';

    protected function rules(): array
    {
        return [
            'patient_name'        => 'required|string|max:255',
            'patient_age'         => 'required|numeric|min:0|max:120',
            'gender'              => 'required|in:Male,Female,Other',
            'email'               => 'required|email|max:255',
            'phone'               => 'required|numeric',
            'address'             => 'required|string|max:500',
            'collection_date'     => 'required|date|after_or_equal:today',
            'collection_time_range' => 'required',
            'notes'               => 'nullable|string|max:500',
        ];
    }

    protected function messages(): array
    {
        return [
            // Patient info
            'patient_name.required' => 'Patient name is required.',
            'patient_name.max'      => 'Patient name may not exceed 255 characters.',

            'patient_age.required'  => 'Patient age is required.',
            'patient_age.numeric'   => 'Patient age must be a valid number.',
            'patient_age.min'       => 'Patient age cannot be negative.',
            'patient_age.max'       => 'Patient age must be 120 or less.',

            'gender.required'       => 'Please select patient gender.',
            'gender.in'             => 'Selected gender is invalid.',

            'email.required'        => 'Email address is required.',
            'email.max'             => 'Email address may not exceed 255 characters.',

            'phone.required' => 'Phone number is required.',
            'phone.numeric'  => 'Phone number must contain only numbers.',

            'address.required' => 'Address is required.',
            'address.max' => 'Address may not exceed 500 characters.',

            'collection_date.required' => 'Preferred date is required.',
            'collection_date.date'     => 'Preferred date must be a valid date.',
            'collection_date.after_or_equal' => 'Preferred date must be today or in the future.',

            'collection_time_range.required' => 'Preferred time range is required.',

            'notes.max' => 'Additional notes may not exceed 500 characters.',
        ];
    }
}
