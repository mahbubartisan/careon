<?php

namespace App\Livewire\Backend\CareLevel;

use App\Livewire\Forms\CareLevelForm;
use App\Models\CareLevel;
use App\Models\CareOption;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditCareLevel extends Component
{
    #[Title('Edit Care Level')]

    public CareLevelForm $form;

    public function mount($careLevelId)
    {
        $this->form->careLevelId = $careLevelId;

        $careLevel = CareLevel::with('careOptions')->findOrFail($this->form->careLevelId);

        // Load all packages for dropdown
        $this->form->packages = Package::select('id', 'name')->get();

        // Fill form data
        $this->form->packageId   = $careLevel->package_id;
        $this->form->name       = $careLevel->name;
        $this->form->description = $careLevel->description;

        // Load hours & prices
        $this->form->levels = $careLevel->careOptions->map(function ($opt) {
            return [
                'id'    => $opt->id,
                'hours' => $opt->hours,
                'price' => $opt->price,
            ];
        })->toArray();

        // If no rows exist, add one row
        if (empty($this->form->levels)) {
            $this->form->levels[] = ['id' => null, 'hours' => '', 'price' => ''];
        }
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

    public function update()
    {
        $this->validate();

        DB::beginTransaction();

        try {

            // Update Main Care Level
            $careLevel = CareLevel::findOrFail($this->form->careLevelId);
            $careLevel->update([
                'package_id'  => $this->form->packageId,
                'name'        => $this->form->name,
                'description' => $this->form->description,
            ]);

            // Track existing option IDs to detect deletion
            $existingOptionIds = $careLevel->careOptions()->pluck('id')->toArray();
            $submittedOptionIds = [];

            // Process submitted levels (update or insert)
            foreach ($this->form->levels as $level) {

                if (isset($level['id']) && $level['id']) {

                    // Update existing row
                    CareOption::where('id', $level['id'])->update([
                        'hours' => $level['hours'],
                        'price' => $level['price'],
                    ]);

                    $submittedOptionIds[] = $level['id'];
                } else {

                    // Create new row
                    $new = CareOption::create([
                        'care_level_id' => $careLevel->id,
                        'hours'         => $level['hours'],
                        'price'         => $level['price'],
                    ]);

                    $submittedOptionIds[] = $new->id;
                }
            }

            // Delete removed rows
            $idsToDelete = array_diff($existingOptionIds, $submittedOptionIds);

            if (!empty($idsToDelete)) {
                CareOption::whereIn('id', $idsToDelete)->delete();
            }

            DB::commit();

            session()->flash('success', 'Care Level updated successfully!');
            return redirect()->route('care-level');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.care-level.edit-care-level')->extends('livewire.backend.layouts.app');
    }
}
