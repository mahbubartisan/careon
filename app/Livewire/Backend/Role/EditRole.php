<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditRole extends Component
{
    public $roles, $name, $roleId;
    public $permissions, $selectedPermissions = [];

    public function mount($roleId) 
    {
        $role = Role::findOrFail($roleId);
        $this->roleId = $role->id;
        $this->name = $role->name;
        $this->permissions = Permission::all();
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:roles,name,' . $this->roleId,
        ]);

        $role = Role::findOrFail($this->roleId);
        $role->update(['name' => $this->name]);

        $permissions = Permission::whereIn('id', $this->selectedPermissions)->pluck('name')->toArray();
        $role->syncPermissions($permissions);

        $this->reset(['name']);
        session()->flash('success', 'Role update successfully!');
        return redirect()->route('role');
    }

    public function render()
    {
        return view('livewire.backend.role.edit-role')->extends('livewire.backend.layouts.app');
    }
}
