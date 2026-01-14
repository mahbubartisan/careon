<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LabForm extends Form
{
    public $name;
    public $search = '';
    public $rowsPerPage = 20;
    public $editMode = null;
    public $isOpen = false;

    public function rules()
    {
        return [
            'name' => 'required|string|max:150|unique:labs,name,' . $this->editMode,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Lab name field is required.',
            'name.string'   => 'Lab name must be a valid string.',
            'name.max'      => 'Lab name must not be greater than 50 characters.',
            'name.unique'   => 'This Lab name already exists.',
        ];
    }
}
