<?php

namespace App\Livewire\Backend\LocationGroup;

use App\Livewire\Forms\LocationGroupForm;
use App\Models\LocationGroup;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditLocationGroup extends Component
{
    #[Title('Edit Location Group')]

    public LocationGroupForm $form;

    public function mount($groupId)
    {
        $this->form->groupId = $groupId;
        $group = LocationGroup::findOrFail($this->form->groupId);
        $this->form->name = $group->name;
        $this->form->price = $group->price;
    }

    public function update()
    {
        // Validate the form
        $this->validate();


        // Update the Location Group data
        $group = LocationGroup::findOrFail($this->form->groupId);
        $group->update([
            'name' => $this->form->name,
            'price' => $this->form->price,
        ]);

        // Optional: flash success message
        session()->flash('success', 'Location Group updated!');
        return redirect()->route('location-group');
    }
    
    public function render()
    {
        return view('livewire.backend.location-group.edit-location-group')->extends('livewire.backend.layouts.app');
    }
}
