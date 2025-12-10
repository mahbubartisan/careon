<?php

namespace App\Livewire\Backend\Service\ServicePrice;

use App\Models\CareLevel;
use App\Models\CareOption;
use App\Models\Package;
use App\Models\Service;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditServicePrice extends Component
{
    #[Title('Edit Service Price')]

    public $serviceId;

    public $packages = [];
    public $services = [];
    public $allCareLevels;
    public $filteredCareLevels = [];

    public $form = [
        "serviceId" => null,
        "groups" => []
    ];

    public function mount($serviceId)
    {
        $this->serviceId = $serviceId;

        $this->services = Service::select('id', 'name')->get();
        $this->packages = Package::select('id', 'name')->get();
        $this->allCareLevels = CareLevel::select('id', 'name')->get();

        $existing = CareOption::where('service_id', $serviceId)->get();

        if ($existing->isEmpty()) {
            $this->initializeDefaultForm();
            return;
        }

        $grouped = [];

        foreach ($existing as $option) {
            $pkg = $option->package_id;
            $cl  = $option->care_level_id;

            if (!isset($grouped[$pkg])) {
                $grouped[$pkg] = [
                    "packageId" => $pkg,
                    "careLevels" => []
                ];
            }

            if (!isset($grouped[$pkg]["careLevels"][$cl])) {
                $grouped[$pkg]["careLevels"][$cl] = [
                    "careLevelId" => $cl,
                    "levels" => []
                ];
            }

            $grouped[$pkg]["careLevels"][$cl]["levels"][] = [
                "hours" => $option->hours,
                "price" => $option->price
            ];
        }

        $this->form['serviceId'] = $serviceId;
        $this->form['groups'] = array_values(array_map(function ($g) {
            $g["careLevels"] = array_values($g["careLevels"]);
            return $g;
        }, $grouped));

        // 🔥 FIX: Load care levels for each package
        foreach ($this->form['groups'] as $index => $group) {
            $packageId = $group['packageId'];

            $this->filteredCareLevels[$index] = CareLevel::where('package_id', $packageId)
                ->pluck('name', 'id')
                ->toArray();
        }
    }


    public function updatedForm($value, $key)
    {
        // When package selection changes
        if (str_ends_with($key, 'packageId')) {

            // Extract group index (groups.0.packageId → 0)
            $gIndex = explode('.', $key)[1];

            $packageId = $value;

            // Load care levels directly by package_id
            $this->filteredCareLevels[$gIndex] = CareLevel::where('package_id', $packageId)
                ->pluck('name', 'id')
                ->toArray();

            // Reset careLevels for this group
            $this->form['groups'][$gIndex]['careLevels'] = [
                [
                    'careLevelId' => '',
                    'levels' => [
                        ['hours' => '', 'price' => '']
                    ]
                ]
            ];
        }
    }

    private function initializeDefaultForm()
    {
        $this->form = [
            "serviceId" => $this->serviceId,
            "groups" => [
                [
                    "packageId" => null,
                    "careLevels" => [
                        [
                            "careLevelId" => null,
                            "levels" => [
                                ["hours" => null, "price" => null]
                            ]
                        ]
                    ]
                ]
            ]
        ];
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
            "price" => null,
        ];
    }

    public function removeLevel($gIndex, $cIndex, $lIndex)
    {
        unset($this->form['groups'][$gIndex]['careLevels'][$cIndex]['levels'][$lIndex]);
        $this->form['groups'][$gIndex]['careLevels'][$cIndex]['levels'] =
            array_values($this->form['groups'][$gIndex]['careLevels'][$cIndex]['levels']);
    }

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

    public function update()
    {
        $this->validate();

        // Delete OLD rows
        CareOption::where('service_id', $this->form['serviceId'])->delete();

        // Re-insert NEW rows
        foreach ($this->form['groups'] as $group) {

            $packageId = $group['packageId'];
            $serviceId = $this->form['serviceId'];

            foreach ($group['careLevels'] as $careLevel) {

                $careLevelId = $careLevel['careLevelId'];

                foreach ($careLevel['levels'] as $row) {

                    CareOption::create([
                        'service_id'    => $serviceId,
                        'package_id'    => $packageId,
                        'care_level_id' => $careLevelId,
                        'hours'         => $row['hours'],
                        'price'         => $row['price'],
                    ]);
                }
            }
        }

        session()->flash('success', 'Care Options updated successfully!');
        return redirect()->route('service.price');
    }

    public function render()
    {
        return view('livewire.backend.service.service-price.edit-service-price')->extends('livewire.backend.layouts.app');
    }
}
