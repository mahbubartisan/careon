<?php

namespace App\Livewire\Backend\LocationGroup;

use App\Livewire\Forms\LocationGroupForm;
use App\Models\LocationGroup;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateLocationGroup extends Component
{
    #[Title('Create Location Group')]

    public LocationGroupForm $form;

    public function store()
    {
        // Validate the form
        $this->validate();

        // Save the Location Group data
        LocationGroup::create([
            'name' => $this->form->name,
            'price' => $this->form->price,
        ]);

        // flash success message
        session()->flash('success', 'Location Group created!');
        return redirect()->route('location-group');
    }

    public function render()
    {
        return view('livewire.backend.location-group.create-location-group')->extends('livewire.backend.layouts.app');
    }
}
