<?php

namespace App\Livewire\Backend\Settings;

use Livewire\Component;
use App\Models\Settings;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;

class CreateSettings extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create Settings')]

    public $site_name, $email, $phone, $address;
    public $slack, $facebook, $twitter, $linkedin, $youtube;
    public $logo, $favIcon;

    public function store()
    {
        $this->validate([
            'site_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string',
            'slack' => 'nullable',
            'twitter' => 'nullable',
            'facebook' => 'nullable',
            'linkedin' => 'nullable',
            'youtube' => 'nullable',
            'logo' => 'required|image|max:1024',
            'favIcon' => 'required|image|max:512',
        ]);

        if ($this->logo) {
            $logo = $this->uploadMedia($this->logo, 'images/settings', 80);
            $logoPath = $logo->id;
        }

        if ($this->favIcon) {
            $fav = $this->uploadMedia($this->favIcon, 'images/settings', 80);
            $favIconPath = $fav->id;
        }

        Settings::create([
            'site_name' => $this->site_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'slack' => $this->slack,
            'twitter' => $this->twitter,
            'facebook' => $this->facebook,
            'linkedin' => $this->linkedin,
            'youtube' => $this->youtube,
            'logo' => $logoPath,
            'fav_icon' => $favIconPath,
        ]);

        session()->flash('success', 'Settings created successfully!');
        return redirect()->route('settings');
    }

    public function render()
    {
        return view('livewire.backend.settings.create-settings')->extends('livewire.backend.layouts.app');
    }
}

