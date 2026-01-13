<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MedicalServiceForm extends Form
{
    public $serviceId, $service_type_id, $image, $service_name, $service_desc, $test_name, $price, $lab_name, $formType, $badge = 0, $status = true;
    public $serviceTypes = [];
    public $tests = [];
    public $labs = [];
    public $search = '';
    public $rowsPerPage = 20;

    protected function rules()
    {
        return [
            'service_type_id' => 'required|exists:service_types,id',

            'service_name' => 'required|string|max:255',
            
            'service_desc' => 'required|string|max:255',

            'image' => $this->serviceId
            ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024'   // optional on update
            : 'required|image|mimes:jpg,jpeg,png,webp|max:1024',  // required on create

            'tests.*.test_name' => 'nullable|string|max:255',
            'tests.*.price' => 'nullable|numeric|min:0',

            'labs.*.lab_name' => 'nullable|string|max:255',
        ];
    }

    protected function messages()
    {
        return [
            'service_type_id.required' => 'Please select a service type.',
            'service_type_id.exists' => 'Selected service type does not exist.',

            'service_name.required' => 'Service name is required.',
            'service_name.max' => 'Service name cannot exceed 255 characters.',
            
            'service_desc.required' => 'Service description is required.',
            'service_desc.max' => 'Service description cannot exceed 255 characters.',

            'image.required' => 'Please upload an image.',
            'image.image' => 'The file must be a valid image.',
            'image.mimes' => 'Image must be JPG, JPEG, PNG, or WEBP.',
            'image.max' => 'Image size cannot exceed 2MB.',

            'tests.*.test_name.required' => 'Test name is required.',
            'tests.*.test_name.string' => 'Test name must be a valid text.',
            'tests.*.test_name.max' => 'Test name cannot exceed 255 characters.',

            // 'tests.*.price.required' => 'Test price is required.',
            // 'tests.*.price.numeric' => 'Test price must be a valid number.',
            // 'tests.*.price.min' => 'Test price must be greater than or equal to 0.',

            // 'labs.*.lab_name.required' => 'Lab name is required.',
            // 'labs.*.lab_name.string' => 'Lab name must be valid text.',
            // 'labs.*.lab_name.max' => 'Lab name cannot exceed 255 characters.',
        ];
    }
}
