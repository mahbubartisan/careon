<?php

namespace App\Livewire\Backend\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPagination;

    #[Title('Users')]

    public $roles, $name, $email, $password, $userId, $roleId;
    public $search = '';
    public $rowsPerPage = 20;
    public $status = true;
    public $editMode = null;
    public $isOpen = false;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset(['name', 'email', 'password', 'status']);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'roleId' => 'required',
        ]);

        $user = User::create(
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'status' => $this->status,
                'created_by' => Auth::id(),
            ]
        );

        $user->syncRoles($this->roleId);

        $this->isOpen = false;
        $this->reset(['name', 'email', 'password', 'status']);
        $this->dispatch('toastr:success', 'User saved successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->editMode = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->status = $user->status;
        $this->roleId = $user->roles->first()?->name ?? '';
        $this->isOpen = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->editMode,
            'roleId' => 'required',
        ]);

        if ($this->editMode) {
            $user = User::findOrFail($this->editMode);

            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'status' => $this->status,
                'updated_by' => Auth::id(),
            ];

            if (!empty($this->password)) {
                $data['password'] = Hash::make($this->password);
            }

            $user->update($data);

            $user->syncRoles([$this->roleId]);

            $this->isOpen = false;
            $this->reset(['editMode', 'name', 'email', 'status', 'password', 'roleId']);
            $this->dispatch('toastr:success', 'User updated successfully!');
        }
    }


    public function delete($id)
    {
        User::findOrFail($id)->delete();
        $this->dispatch('toastr:success', 'User deleted successfully!');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate($this->rowsPerPage);
        return view('livewire.backend.user.users', [
            'users' => $users
        ])->extends('livewire.backend.layouts.app');
    }
}
