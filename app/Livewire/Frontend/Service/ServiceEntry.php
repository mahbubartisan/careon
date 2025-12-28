<?php

namespace App\Livewire\Frontend\Service;

use App\Livewire\Frontend\Service\MedicalTest;
use App\Livewire\Frontend\Service\ServiceDetail;
use App\Models\Service;
use Livewire\Component;

class ServiceEntry extends Component
{
    public Service $service;

    // public function mount($slug)
    // {
    //     $service = Service::where('slug', $slug)->firstOrFail();

    //     return match ($service->form_key) {

    //         'special-care'
    //             => redirect()->route('frontend.service.detail', $service),

    //         'medical-test'
    //             => redirect()->route('frontend.service.diagnostic', $service),
                
    //         'ambulance-support'
    //             => redirect()->route('frontend.service.ambulance', $service),

    //         default => abort(404),
    //     };
    // }

    // public function render()
    // {
    //     return view('livewire.service-entry');
    // }
}


