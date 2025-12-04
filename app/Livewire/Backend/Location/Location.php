<?php

namespace App\Livewire\Backend\Location;

use App\Livewire\Forms\LocationForm;
use App\Models\Location as ModelsLocation;
use App\Models\LocationGroup;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Location extends Component
{
    use WithPagination;

    #[Title('Location')]

    public LocationForm $form;

    public function delete($locationId)
    {
        $location = ModelsLocation::findOrFail($locationId);
        $location->delete();

        session()->flash('success', 'Location deleted!');
        return redirect()->route('location');
    }

    public function render()
    {
        $locationGroups = LocationGroup::with('locations:id,name,location_group_id')
            ->where('name', 'like', '%' . $this->form->search . '%')
            ->paginate($this->form->rowsPerPage);
        return view('livewire.backend.location.location', [
            'locationGroups' => $locationGroups
        ])->extends('livewire.backend.layouts.app');
    }
}
