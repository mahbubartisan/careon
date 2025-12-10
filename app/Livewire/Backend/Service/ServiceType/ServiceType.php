<?php

namespace App\Livewire\Backend\Service\ServiceType;

use App\Livewire\Forms\ServiceTypeForm;
use App\Models\ServiceType as ModelsServiceType;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceType extends Component
{
    use WithPagination;

    #[Title('Service Type')]

    public ServiceTypeForm $form;

    public function openModal()
    {
        $this->form->isOpen = true;
    }

    public function closeModal()
    {
        $this->form->isOpen = false;
        $this->reset(['form.name']);
    }

    public function store()
    {
        $this->validate();

        ModelsServiceType::create([
            'name' => $this->form->name,
        ]);

        $this->form->isOpen = false;
        $this->reset(['form.name']);
        $this->dispatch('toastr:success', 'Service Type created successfully!');
    }

    public function edit($id)
    {
        $district = ModelsServiceType::findOrFail($id);
        $this->form->editMode = $district->id;
        $this->form->name = $district->name;
        $this->form->isOpen = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->form->editMode) {
            $district = ModelsServiceType::findOrFail($this->form->editMode);
            $district->update([
                'name' => $this->form->name,
            ]);

            $this->form->isOpen = false;
            $this->reset(['form.editMode', 'form.name']);
            $this->dispatch('toastr:success', 'Service Type updated successfully!');
        }
    }

    public function delete($id)
    {
        $district = ModelsServiceType::findOrFail($id);

        $district->delete();
        
        $this->dispatch('toastr:success', 'Service Type deleted successfully!');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $serviceTypes = ModelsServiceType::where('name', 'like', '%' . $this->form->search . '%')
        ->latest()
        ->paginate($this->form->rowsPerPage);
        return view('livewire.backend.service.service-type.service-type', [
            'serviceTypes' => $serviceTypes
        ])->extends('livewire.backend.layouts.app');
    }
}
