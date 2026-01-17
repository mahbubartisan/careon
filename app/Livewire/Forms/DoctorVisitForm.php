<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DoctorVisitForm extends Form
{
    public $patient_name, $patient_age, $gender, $phone, $email, $doctor_type, $appointment_date, $appointment_time, $problem;
    public $bookingFor = 'self';

    public function rules(): array
    {
        return [
            'patient_name' => 'required|string|max:255',
            'patient_age' => 'required|integer|min:0',
            'gender' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'doctor_type' => 'required|string',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'problem' => 'required|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'patient_name.required' => 'Patient name is required.',
            'patient_name.string'   => 'Patient name must be valid text.',
            'patient_name.max'      => 'Patient name cannot exceed 255 characters.',

            'patient_age.required' => 'Patient age is required.',
            'patient_age.integer'  => 'Age must be a valid number.',
            'patient_age.min'      => 'Age cannot be negative.',

            'gender.required' => 'Please select a gender.',

            'phone.required' => 'Phone number is required.',
            'phone.numeric'  => 'Phone number must contain only numbers.',
            'phone.max'      => 'Phone number is too long.',

            'email.required' => 'Email address is required.',
            'email.email'    => 'Please enter a valid email address.',

            'doctor_type.required' => 'Please select a doctor type.',
            'doctor_type.string'   => 'Doctor type selection is invalid.',

            'appointment_date.required'       => 'Appointment date is required.',
            'appointment_date.date'           => 'Please select a valid date.',
            'appointment_date.after_or_equal' => 'Appointment date cannot be in the past.',

            'appointment_time.required' => 'Appointment time is required.',

            'problem.required' => 'Please describe your health problem.',
            'problem.string'   => 'Problem description must be valid text.',
            'problem.max'      => 'Problem description cannot exceed 500 characters.',
        ];
    }
}
