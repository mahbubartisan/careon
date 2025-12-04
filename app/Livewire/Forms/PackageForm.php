<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PackageForm extends Form
{
    public $name;
    public $search = '';
    public $rowsPerPage = 20;
    public $packageId = null;

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:packages,name,' . $this->packageId,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.string'   => 'Name must be a valid string.',
            'name.max'      => 'Name must not be greater than 100 characters.',
            'name.unique'   => 'Name already exists. Please choose another.',
        ];
    }
}
