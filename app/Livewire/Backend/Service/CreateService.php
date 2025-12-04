<?php

namespace App\Livewire\Backend\Service;

use App\Livewire\Forms\ServiceForm;
use App\Models\CareLevel;
use App\Models\Package;
use App\Models\ServiceType;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mockery\Generator\StringManipulation\Pass\Pass;

class CreateService extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create Service')]

    public ServiceForm $form;

    public function mount()
    {
        $this->form->serviceTypes = ServiceType::select('id', 'name')->get();
        $this->form->packages = Package::select('id', 'name')->get();
        $this->form->careLevels = CareLevel::select('id', 'name')->get();
        $this->form->care_levels = [
            [
                // 'name' => 'Basic',
                'description' => '',
                'options' => [
                    ['hours' => '', 'price' => '']
                ]
            ],
            [
                // 'name' => 'Standard',
                'description' => '',
                'options' => [
                    ['hours' => '', 'price' => '']
                ]
            ],
            [
                // 'name' => 'Critical',
                'description' => '',
                'options' => [
                    ['hours' => '', 'price' => '']
                ]
            ],
        ];
    }

    public function store()
    {
        dd('store');
    }

    // Example helpers you already referenced in Blade
    public function addFeature($levelIndex)
    {
        $this->form->care_levels[$levelIndex]['features'][] = '';
    }

    public function removeFeature($levelIndex, $fIndex)
    {
        array_splice($this->form->care_levels[$levelIndex]['features'], $fIndex, 1);
    }

    public function addOption($levelIndex)
    {
        $this->form->care_levels[$levelIndex]['options'][] = ['hours' => null, 'price' => null];
    }

    public function removeOption($levelIndex, $oIndex)
    {
        array_splice($this->form->care_levels[$levelIndex]['options'], $oIndex, 1);
    }
    
    public function render()
    {
        return view('livewire.backend.service.create-service')->extends('livewire.backend.layouts.app');
    }
}
