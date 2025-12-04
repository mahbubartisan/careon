<?php

namespace App\Livewire\Frontend\Service;

use Livewire\Component;

class ServiceDetail extends Component
{
    public function render()
    {
        return view('livewire.frontend.service.service-detail')->extends('livewire.frontend.layouts.app');
    }
}
