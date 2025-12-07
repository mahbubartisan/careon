<?php

namespace App\Livewire\Frontend\Service;

use App\Models\ServiceType;
use Livewire\Component;

class Service extends Component
{
    public function render()
    {
        $serviceTypes = ServiceType::with(['services' => function ($q) {
            $q->where('status', 1)->with('media');
        }])->get();

        return view('livewire.frontend.service.service', [
            'serviceTypes' => $serviceTypes,
        ])->extends('livewire.frontend.layouts.app');
    }
}
