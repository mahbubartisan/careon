<?php

namespace App\Livewire\Frontend\Service;

use App\Models\Service;
use Livewire\Component;

class AmbulanceSupport extends Component
{
    public $service;
    
    public function mount($slug)
    {
        $this->service = Service::with([
            'type',
        ])->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.frontend.service.ambulance-support')->extends('livewire.frontend.layouts.app');
    }
}
