<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CareProviderForm extends Form
{
    // Personal Info
    public $full_name, $phone, $email, $date_of_birth, $gender, $nid_number, $present_address, $permanent_address;

    // FORM DATA
    public $service_category, $experience, $qualification, $qualification_status;
    public $languages = [];
    public $availability;

    // FILES
    public $nid = []; // front + back
    public $license;
    public $training_certificate;
    public $police_clearance;

    public $agree = false;

    public function rules()
    {
        return [
            // Personal
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|min:11|max:15|unique:care_providers,phone',
            'email' => 'required|email|unique:care_providers,email',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'nid_number' => 'required|string|unique:care_providers,nid_number',
            'present_address' => 'required|string',
            'permanent_address' => 'required|string',

            // Professional
            'service_category' => 'required',
            'experience' => 'required',
            'qualification' => 'required|max:255',
            'qualification_status' => 'required|in:Completed,Running',

            // Availability
            'languages' => 'required|array|min:1',
            'availability' => 'required',

            // Media
            // 'nid' => 'required|array|size:2',
            // 'nid.*' => 'image|max:5120',

            'license' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
            'training_certificate' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
            'police_clearance' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',

            'agree' => 'accepted',
        ];
    }
}
