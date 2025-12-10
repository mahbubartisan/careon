<?php

namespace App\Livewire\Backend\Service\ServicePrice;

use Livewire\Attributes\Title;
use Livewire\Component;

class EditServicePrice extends Component
{
    #[Title('Create Service Price')]
    
    public function render()
    {
        return view('livewire.backend.service.service-price.edit-service-price')->extends('livewire.backend.layouts.app');
    }
}
