<?php

namespace App\Livewire\Backend\Service\ServicePrice;

use App\Livewire\Forms\ServicePriceForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ServicePrice extends Component
{
    use WithPagination;

    #[Title('Service Price')]

    public ServicePriceForm $form;
    
    public function render()
    {
        return view('livewire.backend.service.service-price.service-price')->extends('livewire.backend.layouts.app');
    }
}
