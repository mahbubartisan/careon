<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DistrictForm extends Form
{
    public $name;
    public $search = '';
    public $rowsPerPage = 20;
    public $editMode = null;
    public $isOpen = false;

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:districts,name,' . $this->editMode,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'District name field is required.',
            'name.string'   => 'District name must be a valid string.',
            'name.max'      => 'District name must not be greater than 50 characters.',
            'name.unique'   => 'This District name already exists. Please choose another.',
        ];
    }
}
