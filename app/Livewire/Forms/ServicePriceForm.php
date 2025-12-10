<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ServicePriceForm extends Form
{
    public $packageId, $serviceId, $careLevelId;
    public $search = '';
    public $rowsPerPage = 20;
    public $priceId = null;
    public $packages = [];
    public $services = [];
    public $careLevels = [];
    public $levels = [];

    public function rules()
    {
        return [
            'packageId' => 'required|exists:packages,id',
            'serviceId' => 'required|exists:services,id',
            'careLevelId' => 'required|exists:care_levels,id',
            'levels.*.hours' => 'required|numeric|min:1',
            'levels.*.price' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [

            'packageId.required' => 'Please select a package.',
            'packageId.exists'   => 'The selected package is invalid.',

            'serviceId.required' => 'Please select a service.',
            'serviceId.exists'   => 'The selected service is invalid.',
            
            'careLevelId.required' => 'Please select a care level.',
            'careLevelId.exists'   => 'The selected care level is invalid.',

            'levels.*.hours.required' => 'Hours field is required.',
            'levels.*.hours.numeric'  => 'Hours must be a valid number.',
            'levels.*.hours.min'      => 'Hour must be at least 1.',

            'levels.*.price.required' => 'Price field is required.',
            'levels.*.price.numeric'  => 'Price must be a valid number.',
            'levels.*.price.min'      => 'Price must be at least 1.',
        ];
    }
}
