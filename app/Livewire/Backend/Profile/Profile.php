<?php

namespace App\Livewire\Backend\Profile;

use App\Models\Media;
use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    use WithFileUploads,  MediaTrait;

    #[Title('Profile')]


    public $name;
    public $email;
    public $password;
    public $photo;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateProfile()
    {
        $user = auth()->user();

        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable',
        ]);

        $user->name = $this->name;
        $user->email = $this->email;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        $this->dispatch('toastr:success', 'Profile updated successfully!');
    }

    public function uploadPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);

        $user = auth()->user();

        if ($user->photo) {
            $oldMedia = Media::find($user->photo);
            if ($oldMedia && File::exists($oldMedia->path)) {
                File::delete($oldMedia->path);
                $oldMedia->delete();
            }
        }

        $newMedia = $this->uploadMedia($this->photo, 'images/profile', 80);
        $user->photo = $newMedia->id;

        $user->save();

        $this->dispatch('toastr:success', 'Profile photo updated successfully!');
    }

    public function render()
    {
        return view('livewire.backend.profile.profile')->extends('livewire.backend.layouts.app');
    }
}
