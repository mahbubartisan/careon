<?php

namespace App\Livewire\Backend\Service\ServicePrice;

use App\Livewire\Forms\ServicePriceForm;
use App\Models\CareLevel;
use App\Models\CareOption;
use App\Models\Package;
use App\Models\Service;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateServicePrice extends Component
{
    #[Title('Create Service Price')]

    // public ServicePriceForm $form;

    public $packages = [];
    public $services = [];
    public $careLevels = [];
    public $levels = [];

    public $form = [
        "serviceId" => null,
        "groups" => [
            [
                "packageId" => null,
                "careLevels" => [
                    [
                        "careLevelId" => null,
                        "levels" => [
                            ["hours" => null, "price" => null],
                        ]
                    ],
                ]
            ],
        ]
    ];

    protected function rules()
    {
        return [
            'form.serviceId' => 'required|exists:services,id',

            'form.groups' => 'required|array|min:1',

            'form.groups.*.packageId' => 'required|exists:packages,id',

            'form.groups.*.careLevels' => 'required|array|min:1',

            'form.groups.*.careLevels.*.careLevelId' => 'required|exists:care_levels,id',

            'form.groups.*.careLevels.*.levels' => 'required|array|min:1',

            'form.groups.*.careLevels.*.levels.*.hours' => 'required|numeric|min:1',
            'form.groups.*.careLevels.*.levels.*.price' => 'required|numeric|min:1',
        ];
    }

    protected $messages = [
        'form.serviceId.required' => 'Service is required.',
        'form.groups.*.packageId.required' => 'Package is required.',
        'form.groups.*.careLevels.*.careLevelId.required' => 'Care level is required.',
        'form.groups.*.careLevels.*.levels.*.hours.required' => 'Hours is required.',
        'form.groups.*.careLevels.*.levels.*.price.required' => 'Price is required.',
    ];


    public function mount()
    {
        $this->services = Service::select('id', 'name')->get();
        $this->packages = Package::select('id', 'name')->get();
        $this->careLevels = CareLevel::select('id', 'name')
            ->get()
            ->unique('name')
            ->values();
        $this->levels = [['hour' => '', 'price' => '']];
    }

    public function addGroup()
    {
        $this->form['groups'][] = [
            "packageId" => null,
            "careLevels" => [
                [
                    "careLevelId" => null,
                    "levels" => [
                        ["hours" => null, "price" => null]
                    ]
                ]
            ]
        ];
    }

    public function removeGroup($gIndex)
    {
        unset($this->form['groups'][$gIndex]);
        $this->form['groups'] = array_values($this->form['groups']);
    }

    public function addCareLevel($gIndex)
    {
        $this->form['groups'][$gIndex]["careLevels"][] = [
            "careLevelId" => null,
            "levels" => [
                ["hours" => null, "price" => null]
            ]
        ];
    }

    public function removeCareLevel($gIndex, $cIndex)
    {
        unset($this->form['groups'][$gIndex]['careLevels'][$cIndex]);
        $this->form['groups'][$gIndex]['careLevels'] =
            array_values($this->form['groups'][$gIndex]['careLevels']);
    }

    public function addLevel($gIndex, $cIndex)
    {
        $this->form['groups'][$gIndex]["careLevels"][$cIndex]["levels"][] = [
            "hours" => null,
            "price" => null
        ];
    }

    public function removeLevel($gIndex, $cIndex, $lIndex)
    {
        unset($this->form['groups'][$gIndex]['careLevels'][$cIndex]['levels'][$lIndex]);
        $this->form['groups'][$gIndex]['careLevels'][$cIndex]['levels'] =
            array_values($this->form['groups'][$gIndex]['careLevels'][$cIndex]['levels']);
    }

    public function store()
    {
        $this->validate();

        foreach ($this->form['groups'] as $group) {

            $packageId = $group['packageId'];
            $serviceId = $this->form['serviceId'];

            foreach ($group['careLevels'] as $careLevel) {

                $careLevelId = $careLevel['careLevelId'];

                foreach ($careLevel['levels'] as $row) {

                    CareOption::create([
                        'service_id'     => $serviceId,
                        'package_id'     => $packageId,
                        'care_level_id'  => $careLevelId,
                        'hours'          => $row['hours'],
                        'price'          => $row['price'],
                    ]);
                }
            }
        }

        // OPTIONAL: reset form
        // $this->reset('form');

        session()->flash('success', 'Care options saved successfully!');
    }


    public function render()
    {
        return view('livewire.backend.service.service-price.create-service-price')->extends('livewire.backend.layouts.app');
    }
}
