<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CareLevelForm extends Form
{
    public $packageId, $name;
    public $search = '';
    public $rowsPerPage = 20;
    public $careLevelId = null;
    public $packages = [];
    public $levels = [];

    public function rules()
    {
        return [
            'packageId' => 'required|exists:packages,id',
            'name' => 'required|string|max:100',
            // 'levels.*.hours' => 'required|numeric|min:1',
            // 'levels.*.price' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [

            'packageId.required' => 'Please select a package.',
            'packageId.exists'   => 'The selected package is invalid.',

            'name.required' => 'Name field is required.',
            'name.string'   => 'Name must be a valid string.',
            'name.max'      => 'Name must not be greater than 100 characters.',
            'name.unique'   => 'Name already exists. Please choose another.',

            // 'description.required' => 'Description field is required.',

            // 'levels.*.hours.required' => 'Hours field is required.',
            // 'levels.*.hours.numeric'  => 'Hours must be a valid number.',
            // 'levels.*.hours.min'      => 'Hour must be at least 1.',

            // 'levels.*.price.required' => 'Price field is required.',
            // 'levels.*.price.numeric'  => 'Price must be a valid number.',
            // 'levels.*.price.min'      => 'Price must be at least 1.',
        ];
    }
}
