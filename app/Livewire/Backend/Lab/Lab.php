<?php

namespace App\Livewire\Backend\Lab;

use App\Livewire\Forms\LabForm;
use App\Models\Lab as ModelsLab;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Lab extends Component
{
    use WithPagination;

    #[Title('Labs')]

    public LabForm $form;

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

        ModelsLab::create([
            'name' => $this->form->name,
        ]);

        $this->form->isOpen = false;
        $this->reset(['form.name']);
        $this->dispatch('toastr:success', 'Lab created successfully!');
    }

    public function edit($id)
    {
        $lab = ModelsLab::findOrFail($id);
        $this->form->editMode = $lab->id;
        $this->form->name = $lab->name;
        $this->form->isOpen = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->form->editMode) {
            $lab = ModelsLab::findOrFail($this->form->editMode);
            $lab->update([
                'name' => $this->form->name,
            ]);

            $this->form->isOpen = false;
            $this->reset(['form.editMode', 'form.name']);
            $this->dispatch('toastr:success', 'Lab updated successfully!');
        }
    }

    public function delete($id)
    {
        ModelsLab::findOrFail($id)->delete();
        $this->dispatch('toastr:success', 'Lab deleted successfully!');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $labs = ModelsLab::where('name', 'like', '%' . $this->form->search . '%')
            ->latest()->paginate($this->form->rowsPerPage);
        return view('livewire.backend.lab.lab', [
            'labs' => $labs
        ])->extends('livewire.backend.layouts.app');
    }
}
