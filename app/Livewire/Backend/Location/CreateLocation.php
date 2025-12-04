<?php

namespace App\Livewire\Backend\Location;

use App\Livewire\Forms\LocationForm;
use App\Models\Location;
use App\Models\LocationGroup;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateLocation extends Component
{
    #[Title('Create Location')]

    public LocationForm $form;

    public function mount()
    {
        $this->form->locationGroups = LocationGroup::select('id','name')->get();
        $this->form->locations = [
            ['name' => '']
        ];
    }

    // Add new location row
    public function addLocation()
    {
        $this->form->locations[] = ['name' => ''];
    }

    // Remove location row
    public function removeLocation($index)
    {
        unset($this->form->locations[$index]);
        $this->form->locations = array_values($this->form->locations);
    }

    public function store()
    {
        $this->validate();
        
        // Save locations
        foreach ($this->form->locations as $loc) {
            Location::create([
                'name' => $loc['name'],
                'location_group_id' => $this->form->location_group_id,
            ]);
        }
    
        session()->flash('success', 'Location added successfully!');
        return redirect()->route('location');  
    }

    public function render()
    {
        return view('livewire.backend.location.create-location')->extends('livewire.backend.layouts.app');
    }
}
