<?php

namespace App\Livewire\Backend\Permission;

use App\Livewire\Forms\PermissionForm;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use WithPagination;

    #[Title('Permissions')]

    public PermissionForm $form;

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

        Permission::create([
            'name' => $this->form->name,
        ]);

        $this->form->isOpen = false;
        $this->reset(['form.name']);
        $this->dispatch('toastr:success', 'Permission created successfully!');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $this->form->editMode = $permission->id;
        $this->form->name = $permission->name;
        $this->form->isOpen = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->form->editMode) {
            $permission = Permission::findOrFail($this->form->editMode);
            $permission->update([
                'name' => $this->form->name,
            ]);

            $this->form->isOpen = false;
            $this->reset(['form.editMode', 'form.name']);
            $this->dispatch('toastr:success', 'Permission updated successfully!');
        }
    }

    public function delete($id)
    {
        Permission::findOrFail($id)->delete();
        $this->dispatch('toastr:success', 'Permission deleted successfully!');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $permissions = Permission::where('name', 'like', '%' . $this->form->search . '%')
            ->latest()->paginate($this->form->rowsPerPage);
        return view('livewire.backend.permission.permissions', [
            'permissions' => $permissions
        ])->extends('livewire.backend.layouts.app');
    }
}
