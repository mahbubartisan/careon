<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LocationGroupForm extends Form
{
    public $name, $price;
    public $search = '';
    public $rowsPerPage = 20;
    public $groupId = null;

    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:location_groups,name,' . $this->groupId,
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.string'   => 'Name must be a valid string.',
            'name.max'      => 'Name must not be greater than 100 characters.',
            'name.unique'   => 'Name already exists. Please choose another.',
            
            'price.required' => 'Price field is required.',
            'price.number'   => 'Price must be a valid number.',
        ];
    }
}
