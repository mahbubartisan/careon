<?php

namespace App\Livewire\Backend\Settings;

use App\Models\Media;
use App\Models\Settings;
use App\Traits\MediaTrait;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSettings extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit Settings')]

    public $site_name, $email, $phone, $address, $office_hours, $whatsapp;
    public $instagram, $twitter, $facebook, $linkedin, $youtube, $meta_title, $meta_description;
    public $logo, $favIcon;
    public $settingId;

    public function mount($settingId)
    {
        $this->settingId = $settingId;
        $setting = Settings::findOrFail($this->settingId);
        $this->site_name = $setting->site_name;
        $this->email = $setting->email;
        $this->phone = $setting->phone;
        $this->office_hours = $setting->office_hours;
        $this->whatsapp = $setting->whatsapp;
        $this->meta_title = $setting->meta_title;
        $this->meta_description = $setting->meta_description;
        $this->address = $setting->address;
        $this->instagram = $setting->instagram;
        $this->twitter = $setting->twitter;
        $this->facebook = $setting->facebook;
        $this->linkedin = $setting->linkedin;
        $this->youtube = $setting->youtube;
    }

    public function update()
    {
        $this->validate([
            'site_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'office_hours' => 'required',
            'whatsapp' => 'required',
            'address' => 'required|string',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'facebook' => 'nullable',
            'linkedin' => 'nullable',
            'youtube' => 'nullable',
            'logo' => 'nullable|image|max:1024',
            'favIcon' => 'nullable|image|max:512',
        ]);

        $setting = Settings::findOrFail($this->settingId);

        if ($this->logo) {
            $oldMedia = Media::where('id', $setting->logo)->first();

            if ($oldMedia && File::exists(public_path($oldMedia->path))) {
                File::delete(public_path($oldMedia->path));
                $oldMedia->delete();
            }

            $newPhoto = $this->uploadMedia(
                $this->logo,
                'images/settings',
                80
            );
            $newPhotoId = $newPhoto->id;
        } else {
            $newPhotoId = $setting->logo;
        }

        if ($this->favIcon) {
            $oldMedia = Media::where('id', $setting->favIcon)->first();

            if ($oldMedia && File::exists(public_path($oldMedia->path))) {
                File::delete(public_path($oldMedia->path));
                $oldMedia->delete();
            }

            $newFavIcon = $this->uploadMedia($this->favIcon, 'images/settings', 80);
            $newFavId = $newFavIcon->id;
        } else {
            $newFavId = $setting->fav_icon;
        }

        $setting->update([
            'site_name' => $this->site_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'office_hours' => $this->office_hours,
            'whatsapp' => $this->whatsapp,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'address' => $this->address,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'facebook' => $this->facebook,
            'linkedin' => $this->linkedin,
            'youtube' => $this->youtube,
            'logo' => $newPhotoId,
            'fav_icon' => $newFavId,
        ]);

        session()->flash('success', 'Settings updated!');
        return redirect()->route('settings');
    }

    public function render()
    {
        return view('livewire.backend.settings.edit-settings')->extends('livewire.backend.layouts.app');
    }
}
