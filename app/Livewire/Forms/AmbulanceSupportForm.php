<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AmbulanceSupportForm extends Form
{
    public $patient_name, $patient_age, $gender, $email;
    public $contact_person, $phone;
    public $pickup_address, $destination_address;
    public $ambulance_type, $booking_type, $pickup_datetime;
    public $notes;

    protected function rules(): array
    {
        return [
            'patient_name'        => 'required|string|max:255',
            'patient_age'         => 'required|numeric|min:0|max:120',
            'gender'              => 'required|in:Male,Female,Other',
            'email'               => 'required|email|max:255',

            'contact_person'      => 'required|string|max:255',
            'phone'               => 'required|numeric',

            'pickup_address'      => 'required|string|max:500',
            'destination_address' => 'required|string|max:500',

            'ambulance_type'      => 'required',
            'booking_type'        => 'required|in:Emergency,Scheduled',
            'pickup_datetime'     => 'required|date|after_or_equal:now',

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

            // Contact
            'contact_person.required' => 'Contact person name is required.',
            'contact_person.max'      => 'Contact person name may not exceed 255 characters.',

            'phone.required' => 'Phone number is required.',
            'phone.numeric'  => 'Phone number must contain only numbers.',
          
            // Location
            'pickup_address.required'      => 'Pickup address is required.',
            'pickup_address.max'           => 'Pickup address may not exceed 500 characters.',

            'destination_address.required' => 'Destination address is required.',
            'destination_address.max'      => 'Destination address may not exceed 500 characters.',

            // Ambulance
            'ambulance_type.required' => 'Please select an ambulance type.',

            'booking_type.required' => 'Please select booking type.',
            'booking_type.in'       => 'Selected booking type is invalid.',

            'pickup_datetime.required' => 'Pickup date and time is required.',
            'pickup_datetime.date'     => 'Pickup date and time must be a valid date.',
            'pickup_datetime.after_or_equal' =>
            'Pickup date and time must be now or in the future.',

            // Notes
            'notes.max' => 'Additional notes may not exceed 500 characters.',
        ];
    }
}
