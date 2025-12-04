<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AdvisorForm extends Form
{
    public $advisorId, $image, $name, $designation, $detail;
    public $search = '';
    public $rowsPerPage = 20;

    public function rules()
    {
        return [

            'image' => $this->advisorId ? 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name'         => 'required|string|max:255',
            'designation'  => 'required|string|max:255',
            'detail'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Advisor name field is required.',
            'name.string'           => 'Advisor name must be a valid text.',
            'name.max'              => 'Advisor name may not be greater than 255 characters.',

            'designation.required'  => 'Designation field is required.',
            'designation.string'    => 'Designation must be valid text.',
            'designation.max'       => 'Designation may not exceed 255 characters.',

            'detail.required'       => 'Detail is required.',
           
            'image.required'        => 'Please upload an image.',
            'image.image'           => 'The file must be an image.',
            'image.mimes'           => 'Only jpeg, png, jpg, and webp formats are allowed.',
            'image.max'             => 'The image size cannot exceed 2MB.',
        ];
    }
}
