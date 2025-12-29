<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ServiceForm extends Form
{
    public $serviceId, $care_level_id, $name, $service_type_id, $image, $badge = 0, $short_desc, $status = true;
    public $search = '';
    public $rowsPerPage = 20;
    public $serviceTypes = [];
    public $care_levels = [];
    public $careLevels = [];
    
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:services,name,' . $this->serviceId,
            'image' => $this->serviceId
                ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'   // optional on update
                : 'required|image|mimes:jpg,jpeg,png,webp|max:2048',  // required on create
            'short_desc' => 'required|string|max:500',
            'badge' => 'boolean',
            'status' => 'boolean',
            
            'care_levels.*.care_level_id' => 'required|exists:care_levels,id',
            'care_levels.*.desc' => 'required|string',

            'care_levels.*.options.*.hours' => 'required|numeric|min:1',
            'care_levels.*.options.*.price' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Service name is required.',
            'name.unique' => 'This service name is already taken.',

            'image.required' => 'Pleas upload an image.',
            'image.image' => 'The file must be a valid image.',
            'image.mimes' => 'Image must be JPG, JPEG, PNG, or WEBP.',
            'image.max' => 'Image size cannot exceed 2MB.',

            'short_desc.required' => 'Service description is required.',
            'short_desc.max' => 'Service description must not exceed 500 characters.',
        ];
    }
}
