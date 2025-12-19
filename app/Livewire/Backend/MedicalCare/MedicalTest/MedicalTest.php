<?php

namespace App\Livewire\Backend\MedicalCare\MedicalTest;

use App\Livewire\Forms\MedicalTestForm;
use App\Models\Service;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class MedicalTest extends Component
{
    use WithPagination, MediaTrait;

    #[Title('Medical Test')]

    public MedicalTestForm $form;

    public function render()
    {
        $services = Service::with('media')
            ->where('service_type_id', 3)
            ->where('name', 'like', '%' . $this->form->search . '%')
            ->get();
        return view('livewire.backend.medical-care.medical-test.medical-test', [
            'services' => $services
        ])->extends('livewire.backend.layouts.app');
    }
}
