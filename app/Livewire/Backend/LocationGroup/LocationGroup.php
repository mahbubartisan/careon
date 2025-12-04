<?php

namespace App\Livewire\Backend\LocationGroup;

use App\Livewire\Forms\LocationGroupForm;
use App\Models\LocationGroup as ModelsLocationGroup;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class LocationGroup extends Component
{
    use WithPagination;

    #[Title('Location Group')]

    public LocationGroupForm $form;

    public function delete($groupId)
    {
        $group = ModelsLocationGroup::findOrFail($groupId);
        $group->delete();

        session()->flash('success', 'Location Group deleted!');
        return redirect()->route('location-group');
    }

    public function render()
    {
        $locationGroups = ModelsLocationGroup::where('name', 'like', '%' . $this->form->search . '%')
            ->where('price', 'like', '%' . $this->form->search . '%')
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.location-group.location-group', [
            'locationGroups' => $locationGroups
        ])->extends('livewire.backend.layouts.app');
    }
}
