<?php

namespace App\Livewire\Frontend\Service;

use App\Models\Service;
use Livewire\Component;

class MedicalTest extends Component
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
        return view('livewire.frontend.service.medical-test')->extends('livewire.frontend.layouts.app');
    }
}
