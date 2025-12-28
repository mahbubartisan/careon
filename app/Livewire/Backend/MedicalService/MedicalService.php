<?php

namespace App\Livewire\Backend\MedicalService;

use App\Livewire\Forms\MedicalServiceForm;
use App\Models\Service;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class MedicalService extends Component
{
    use WithPagination, MediaTrait;

    #[Title('Medical Service')]

    public MedicalServiceForm $form;

    public function toggleStatus($id)
    {
        $service = Service::findOrFail($id);
        $service->status = !$service->status;
        $service->save();

        $this->dispatch('toastr:success', 'Service status updated!');
    }

    public function delete($id)
    {
        $service = Service::findOrFail($id);

        // Delete all care options of this service
        $service->careOptions()->delete();

        // Delete service care levels
        $service->serviceCareLevels()->delete();

        // Delete service image if exists
        if ($service->image) {
            $this->deleteMedia($service->image);
        }

        // Delete service record
        $service->delete();

        $this->dispatch('toastr:success', 'Service deleted Successfully!');
        return redirect()->back();
    }

    public function render()
    {
        $services = Service::with('media')
            ->where('service_type_id', 3)
            ->where('name', 'like', '%' . $this->form->search . '%')
            ->get();
        return view('livewire.backend.medical-service.medical-service', [
            'services' => $services
        ])->extends('livewire.backend.layouts.app');
    }
}
