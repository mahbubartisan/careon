<?php

namespace App\Livewire\Backend\CareLevel;

use App\Livewire\Forms\CareLevelForm;
use App\Models\CareLevel as ModelsCareLevel;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class CareLevel extends Component
{
    use WithPagination;

    #[Title('Care Level')]

    public CareLevelForm $form;

    public function delete($id)
    {
        $careLevel = ModelsCareLevel::findOrFail($id);

        $careLevel->delete();

        session()->flash('success', 'Care Level deleted successfully!');
        return redirect()->route('care-level');
    }

    public function render()
    {
        $careLevels = ModelsCareLevel::with(['package', 'careOptions'])
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->form->search . '%')
                    ->orWhereHas('package', function ($q) {
                        $q->where('name', 'like', '%' . $this->form->search . '%');
                    });
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.care-level.care-level', [
            'careLevels' => $careLevels
        ])->extends('livewire.backend.layouts.app');
    }
}
