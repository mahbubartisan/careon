<?php

namespace App\Livewire\Backend\Location;

use App\Livewire\Forms\LocationForm;
use App\Models\Location;
use App\Models\LocationGroup;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditLocation extends Component
{
    #[Title('Edit Location')]
    
    public LocationForm $form;

    public function mount($locationGroupId)
    {
        $this->form->locationGroupId = $locationGroupId;

        $this->form->location_group_id = $locationGroupId;

        $this->form->locationGroups = LocationGroup::select('id', 'name')->get();

        $this->loadExistingLocations();
        
    }

    // Load existing rows
    private function loadExistingLocations()
    {
        $existing = Location::where('location_group_id', $this->form->locationGroupId)->get();

        $this->form->locations = $existing->map(function ($loc) {
            return [
                'id'   => $loc->id,
                'name' => $loc->name,
            ];
        })->toArray();
    }

    // Add new empty row
    public function addLocation()
    {
        $this->form->locations[] = [
            'id'   => null,
            'name' => '',
        ];
    }

    // Remove a row (soft remove)
    public function removeLocation($index)
    {
        unset($this->form->locations[$index]);
        $this->form->locations = array_values($this->form->locations);
    }

    public function update()
    {
        // $this->validate();

        $existingIds = Location::where('location_group_id', $this->form->locationGroupId)
            ->pluck('id')
            ->toArray();

        $submittedIds = [];

        foreach ($this->form->locations as $locRow) {

            // NEW ROW
            if (!$locRow['id']) {
                $new = Location::create([
                    'name' => $locRow['name'],
                    'location_group_id' => $this->form->location_group_id,
                ]);
                $submittedIds[] = $new->id;
            } 
            else {
                // UPDATE OLD ROW
                $submittedIds[] = $locRow['id'];

                Location::where('id', $locRow['id'])->update([
                    'name' => $locRow['name'],
                    'location_group_id' => $this->form->location_group_id,
                ]);
            }
        }

        // DELETE REMOVED ROWS
        $deleteIds = array_diff($existingIds, $submittedIds);

        if (!empty($deleteIds)) {
            Location::whereIn('id', $deleteIds)->delete();
        }

        session()->flash('success', 'Locations updated successfully!');

        return redirect()->route('location');
    }

    public function render()
    {
        return view('livewire.backend.location.edit-location')->extends('livewire.backend.layouts.app');
    }
}
