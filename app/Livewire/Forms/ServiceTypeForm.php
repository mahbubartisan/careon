<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ServiceTypeForm extends Form
{
    public $name;
    public $search = '';
    public $rowsPerPage = 20;
    public $editMode = null;
    public $isOpen = false;

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:service_types,name,' . $this->editMode,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Service Type name field is required.',
            'name.string'   => 'Service Type name must be a valid string.',
            'name.max'      => 'Service Type name must not be greater than 50 characters.',
            'name.unique'   => 'This Service Type name already exists. Please choose another.',
        ];
    }
}
