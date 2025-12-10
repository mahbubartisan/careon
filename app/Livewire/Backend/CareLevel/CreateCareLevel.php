<?php

namespace App\Livewire\Backend\CareLevel;

use App\Livewire\Forms\CareLevelForm;
use App\Models\CareLevel;
use App\Models\CareOption;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateCareLevel extends Component
{
    #[Title('Create Care Level')]

    public CareLevelForm $form;

    public function mount()
    {
        $this->form->packages = Package::select('id', 'name')->get();
        $this->form->levels = [['hour' => '', 'price' => '']];
    }

    public function addOption()
    {
        $this->form->levels[] = ['hour' => '', 'price' => ''];
    }

    public function removeOption($index)
    {
        unset($this->form->levels[$index]);
        $this->form->levels = array_values($this->form->levels); // reindex
    }

    public function store()
    {
        $this->validate();

        DB::beginTransaction();

        try {

            // Create Care Level
            $careLevel = CareLevel::create([
                'package_id'  => $this->form->packageId,
                'name'        => $this->form->name,
                // 'description' => $this->form->description,
            ]);

            // Insert Hours & Price Rows
            foreach ($this->form->levels as $level) {
                CareOption::create([
                    'package_id'    => $this->form->packageId,
                    'care_level_id' => $careLevel->id,
                    'hours'         => $level['hours'],
                    'price'         => $level['price'],
                ]);
            }

            DB::commit();
            
            session()->flash('success', 'Care Level created successfully!');
            return redirect()->route('care-level');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.care-level.create-care-level')->extends('livewire.backend.layouts.app');
    }
}
