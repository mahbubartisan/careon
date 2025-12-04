<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateRole extends Component
{
    public $roles, $name;
    public $permissions, $selectedPermissions = [];

    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create([
            'name' => $this->name
        ]);

        if ($this->selectedPermissions) {
            $permissions = Permission::whereIn('id', $this->selectedPermissions)->pluck('name')->toArray();
            $role->syncPermissions($permissions);
        }

        $this->reset(['name']);
        session()->flash('success', 'Role saved successfully!');
        return redirect()->route('role');
    }

    public function render()
    {
        return view('livewire.backend.role.create-role')->extends('livewire.backend.layouts.app');
    }
}
