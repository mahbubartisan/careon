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

    #[Title('Services')]

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

        // Delete advisor image if exists
        if ($service->image) {
            $this->deleteMedia($service->image);
        }

        // Delete advisor record
        $service->delete();

        $this->dispatch('toastr:success', 'Service deleted!');
        return redirect()->back();
    }

    public function render()
    {
        $services = ModelsService::with(['media', 'serviceType', 'careLevel'])
            ->where('name', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);
        return view('livewire.backend.service.service')->extends('livewire.backend.layouts.app');
    }
}
