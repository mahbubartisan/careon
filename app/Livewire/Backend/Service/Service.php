<?php

namespace App\Livewire\Backend\Service;

use App\Livewire\Forms\ServiceForm;
use App\Models\Service as ModelsService;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Service extends Component
{
    use WithPagination, MediaTrait;

    #[Title('Special Services')]

    public ServiceForm $form;

    public function toggleStatus($id)
    {
        $service = ModelsService::findOrFail($id);
        $service->status = !$service->status;
        $service->save();

        $this->dispatch('toastr:success', 'Status updated!');
    }

    public function delete($id)
    {
        $service = ModelsService::findOrFail($id);

        // Delete service care levels
        $service->serviceCareLevels()->delete();

        // Delete service image if exists
        if ($service->image) {
            $this->deleteMedia($service->image);
        }

        // Delete service record
        $service->delete();

        $this->dispatch('toastr:success', 'Service deleted!');
        return redirect()->back();
    }

    public function render()
    {
        $services = ModelsService::with('media')
            ->where(function ($q) {
                $q->where('service_id', 'like', '%' . $this->form->search . '%')
                    ->orWhere('name', 'like', '%' . $this->form->search . '%');
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.service.service', [
            'services' => $services,
        ])->extends('livewire.backend.layouts.app');
    }
}
