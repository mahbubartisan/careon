<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LocationForm extends Form
{
    public $name, $location_group_id;
    public $search = '';
    public $rowsPerPage = 20;
    public $locationId;
    public $locationGroupId;
    public $locations = [];
    public $locationGroups = [];

    public function rules()
    {
        return [
            'locations.*.name' => 'required|string|max:255|unique:locations,name,' . $this->locationId,
            'location_group_id' => 'required|exists:location_groups,id',
        ];
    }

    public function messages()
    {
        return [
            'locations.*.name.required' => 'Location name is required.',
            'locations.*.name.string'   => 'Location name must be valid text.',
            'locations.*.name.max'      => 'Location name cannot exceed 255 characters.',
            'locations.*.name.unique'   => 'This location name already exists.',

            'location_group_id.required' => 'Please select a location group.',
            'location_group_id.exists'   => 'The selected location group is invalid.',
        ];
    }
}
