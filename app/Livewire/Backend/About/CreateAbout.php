<?php

namespace App\Livewire\Backend\About;

use App\Models\About;
use Livewire\Component;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Livewire\Forms\AboutForm;

class CreateAbout extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create About')]

    public AboutForm $form;

    public function store()
    {
        // Validate the form
        $this->validate();

        // Handle image upload if present
        if ($this->form->image) {
            $image = $this->uploadMedia($this->form->image, 'images/about', 80);
            $imagePath = $image->id;
        }

        // Save the About data
        About::create([
            'image' => $imagePath,
            'established' => $this->form->established,
            'location' => $this->form->location,
            'players' => $this->form->players,
            'fans' => $this->form->fans,
            'contact' => $this->form->contact,
            'years' => $this->form->years,
            'description' => $this->form->description,
        ]);

        // Optional: flash success message
        session()->flash('success', 'About information created!');
        return redirect()->route('about');
    }

    public function render()
    {
        return view('livewire.backend.about.create-about')->extends('livewire.backend.layouts.app');
    }
}
