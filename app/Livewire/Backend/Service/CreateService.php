<?php

namespace App\Livewire\Backend\Service;

use App\Livewire\Forms\ServiceForm;
use App\Models\CareLevel;
use App\Models\CareOption;
use App\Models\Service;
use App\Models\ServiceCareLevel;
use App\Models\ServiceType;
use App\Traits\MediaTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateService extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create Service')]

    public ServiceForm $form;
    public $care_levels = [];

    public function mount()
    {
        $this->form->serviceTypes = ServiceType::select('id', 'name')->get();
        $this->form->careLevels = CareLevel::select('id', 'name')->get();
        $this->care_levels = [
            [
                'care_level_id' => '',
                'desc' => '',
                'options' => [
                    ['hours' => '', 'price' => '']
                ]
            ],
            [
                'care_level_id' => '',
                'desc' => '',
                'options' => [
                    ['hours' => '', 'price' => '']
                ]
            ],
            [
                'care_level_id' => '',
                'desc' => '',
                'options' => [
                    ['hours' => '', 'price' => '']
                ]
            ],
        ];
    }

    public function addOption($levelIndex)
    {
        $this->form->care_levels[$levelIndex]['options'][] = ['hours' => null, 'price' => null];
    }

    public function removeOption($levelIndex, $oIndex)
    {
        array_splice($this->form->care_levels[$levelIndex]['options'], $oIndex, 1);
    }

    public function store()
    {
        $this->validate();

        DB::beginTransaction();

        try {

            /* -------------------------
            1. STORE SERVICE
        -------------------------- */
            if ($this->form->image) {
                $image = $this->uploadMedia($this->form->image, 'images/service', 80);
                $imagePath = $image->id;
            }

            $service = Service::create([
                'name' => $this->form->name,
                'image' => $imagePath,
                'short_desc' => $this->form->short_desc,
                'badge' => $this->form->badge ?? 0,
                'status' => $this->form->status ?? 1,
            ]);



            /* -------------------------
            2. STORE CARE LEVELS
        -------------------------- */
            foreach ($this->form->care_levels as $level) {

                $careLevel = ServiceCareLevel::create([
                    'service_id'     => $service->id,
                    'care_level_id'  => $level['care_level_id'],
                    'description'    => $level['desc'],
                ]);


                /* -------------------------
                3. STORE CARE OPTIONS
            -------------------------- */
                foreach ($level['options'] as $option) {
                    CareOption::create([
                        'care_level_id' => $level['care_level_id'],
                        'hours' => $option['hours'],
                        'price' => $option['price'],
                    ]);
                }
            }


            DB::commit();

            // $this->reset();
            session()->flash('success', 'Service created successfully!');
            return redirect()->route('service');
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function render()
    {
        return view('livewire.backend.service.create-service')->extends('livewire.backend.layouts.app');
    }
}
