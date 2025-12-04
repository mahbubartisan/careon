<?php

namespace App\Livewire\Backend\Service;

use App\Livewire\Forms\ServiceForm;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditService extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit Service')]

    public ServiceForm $form;
    
    public function render()
    {
        return view('livewire.backend.service.edit-service')->extends('livewire.backend.layouts.app');
    }
}
