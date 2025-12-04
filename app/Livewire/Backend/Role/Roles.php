<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;

    #[Title('Roles')]

    public $name;
    public $search = '';
    public $rowsPerPage = 20;

    public function delete($roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->delete();

        session()->flash('success', 'Role deleted successfully!');
        return redirect()->route('role');
    }

    public function render()
    {
        $roles = Role::where('name', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate($this->rowsPerPage);
        return view('livewire.backend.role.roles', [
            'roles' => $roles
        ])->extends('livewire.backend.layouts.app');
    }
}
