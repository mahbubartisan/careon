<?php

namespace App\Livewire\Backend\Advisor;

use App\Livewire\Forms\AdvisorForm;
use App\Models\Advisor;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditAdvisor extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit Advisor')]

    public AdvisorForm $form;

    public function mount($advisorId)
    {
        $this->form->advisorId = $advisorId;

        $advisor = Advisor::findOrFail($this->form->advisorId);

        $this->form->fill([
            'name' => $advisor->name,
            'designation' => $advisor->designation,
            'detail' => $advisor->detail,
        ]);
    }

    public function update()
    {
        $this->validate();

        $advisor = Advisor::findOrFail($this->form->advisorId);

        // Handle new image upload
        if ($this->form->image && !is_int($this->form->image)) {
            // Delete the old media if it exists
            if ($advisor->image) {
                $this->deleteMedia($advisor->image);
            }

            // Upload the new image
            $newPhoto = $this->uploadMedia(
                $this->form->image,
                'images/advisor',
                80
            );

            $newPhotoId = $newPhoto->id;
        } else {
            $newPhotoId = $advisor->image; // keep the existing image
        }

        $advisor->update([
            'image' => $newPhotoId,
            'name' => $this->form->name,
            'designation' => $this->form->designation,
            'detail' => $this->form->detail,
        ]);

        session()->flash('success', 'Advisor information updated!');
        return redirect()->route('advisor');
    } 

    public function render()
    {
        return view('livewire.backend.advisor.edit-advisor')->extends('livewire.backend.layouts.app');
    }
}
