<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ServiceForm extends Form
{
    public $serviceId, $packageId, $care_level_id, $name, $service_type_id, $image, $badge = false, $short_desc, $status = true;
    public $search = '';
    public $rowsPerPage = 20;
    public $serviceTypes = [];
    public $packages = [];
    public $care_levels = [];
    public $careLevels = [];
    
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:services,name,' . $this->serviceId,
            'service_type_id' => 'required|exists:service_types,id',
            'image' => $this->serviceId
                ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'   // optional on update
                : 'required|image|mimes:jpg,jpeg,png,webp|max:2048',  // required on create
            'short_desc' => 'required|string|max:500',
            'badge' => 'boolean',
            'status' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Service name is required.',
            'name.unique' => 'This service name is already taken.',

            'service_type_id.required' => 'Please select a service type.',
            'service_type_id.exists' => 'Selected service type is invalid.',

            'image.required' => 'Pleas upload an image.',
            'image.image' => 'The file must be a valid image.',
            'image.mimes' => 'Image must be JPG, JPEG, PNG, or WEBP.',
            'image.max' => 'Image size cannot exceed 2MB.',

            'short_desc.required' => 'Short description is required.',
            'short_desc.max' => 'Short description must not exceed 500 characters.',
        ];
    }
}
