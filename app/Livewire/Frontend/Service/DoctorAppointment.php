<?php

namespace App\Livewire\Frontend\Service;

use App\Models\Service;
use Livewire\Component;

class DoctorAppointment extends Component
{
    // public AmbulanceRequestForm $form;

    public $service;

    public function mount($slug)
    {
        $this->service = Service::with('type')->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.frontend.service.doctor-appointment')->extends('livewire.frontend.layouts.app');
    }
}
