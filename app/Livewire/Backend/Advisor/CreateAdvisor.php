<?php

namespace App\Livewire\Backend\Advisor;

use App\Livewire\Forms\AdvisorForm;
use App\Models\Advisor;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAdvisor extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create Advisor')]

    public AdvisorForm $form;

    public function store()
    {
        // Validate the form
        $this->validate();

        // Handle image upload if present
        if ($this->form->image) {
            $image = $this->uploadMedia($this->form->image, 'images/advisory', 80);
            $imagePath = $image->id;
        }

        // Save the About data
        Advisor::create([
            'image' => $imagePath,
            'name' => $this->form->name,
            'designation' => $this->form->designation,
            'detail' => $this->form->detail,
        ]);

        // Optional: flash success message
        session()->flash('success', 'Advisory information created!');
        return redirect()->route('advisor');
    }

    public function render()
    {
        return view('livewire.backend.advisor.create-advisor')->extends('livewire.backend.layouts.app');
    }
}
