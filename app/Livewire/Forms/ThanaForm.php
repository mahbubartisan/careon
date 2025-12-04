<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ThanaForm extends Form
{
    public $name, $district_id;
    public $search = '';
    public $rowsPerPage = 20;
    public $editMode = null;
    public $isOpen = false;
    public $districts = [];

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:thanas,name,' . $this->editMode,
            'district_id' => 'required|exists:districts,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Thana name field is required.',
            'name.string'   => 'Thana name must be a valid string.',
            'name.max'      => 'Thana name must not be greater than 50 characters.',
            'name.unique'   => 'This Thana name already exists. Please choose another.',

            'district_id.required' => 'Please select a district.',
            'district_id.exists'   => 'The selected district is invalid.',
        ];
    }
}
