<?php

namespace App\Livewire\Backend\About;

use App\Models\About;
use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\AboutForm;

class EditAbout extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit About')]

    public AboutForm $form;

    public function mount($aboutId)
    {
        $this->form->aboutId = $aboutId;

        $about = About::findOrFail($this->form->aboutId);

        $this->form->fill([
            'established' => $about->established,
            'location' => $about->location,
            'players' => $about->players,
            'fans' => $about->fans,
            'contact' => $about->contact,
            'years' => $about->years,
            'description' => $about->description,
        ]);
    }

    public function update()
    {
        $this->validate();

        $about = About::findOrFail($this->form->aboutId);

        // Handle new image upload
        if ($this->form->image && !is_int($this->form->image)) {
            // Delete the old media if it exists
            if ($about->image) {
                $this->deleteMedia($about->image);
            }

            // Upload the new image
            $newPhoto = $this->uploadMedia(
                $this->form->image,
                'images/about',
                80
            );

            $newPhotoId = $newPhoto->id;
        } else {
            $newPhotoId = $about->image; // keep the existing image
        }

        $about->update([
            'image' => $newPhotoId,
            'established' => $this->form->established,
            'location' => $this->form->location,
            'players' => $this->form->players,
            'fans' => $this->form->fans,
            'contact' => $this->form->contact,
            'years' => $this->form->years,
            'description' => $this->form->description,
        ]);

        session()->flash('success', 'About information updated!');
        return redirect()->route('about');
    }

    public function render()
    {
        return view('livewire.backend.about.edit-about')->extends('livewire.backend.layouts.app');
    }
}
