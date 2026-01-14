<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PermissionForm extends Form
{
    public $name;
    public $search = '';
    public $rowsPerPage = 20;
    public $editMode = null;
    public $isOpen = false;

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:permissions,name,' . $this->editMode,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Permission name field is required.',
            'name.string'   => 'Permission name must be a valid string.',
            'name.max'      => 'Permission name must not be greater than 50 characters.',
            'name.unique'   => 'This Permission name already exists.',
        ];
    }
}
