<?php

namespace App\Livewire\Backend\Service;

use App\Livewire\Forms\ServiceForm;
use App\Traits\MediaTrait;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateService extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create Service')]

    public ServiceForm $form;

    public function store()
    {
        dd('store');
    }
    
    public function render()
    {
        return view('livewire.backend.service.create-service')->extends('livewire.backend.layouts.app');
    }
}
