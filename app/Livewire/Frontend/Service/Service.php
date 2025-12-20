<?php

namespace App\Livewire\Frontend\Service;

use App\Models\Service as ModelsService;
use App\Models\ServiceType;
use Livewire\Component;

class Service extends Component
{

    public function redirectToServiceForm($slug)
    {
        $service = ModelsService::where('slug', $slug)->firstOrFail();

        switch ($service->form_key) {

            case 'special-care':
                return redirect()->route('frontend.service.detail', [
                    'slug' => $service->slug
                ]);

            case 'medical-test':
                return redirect()->route('frontend.service.medical', [
                    'slug' => $service->slug
                ]);

            default:
                abort(404);
        }
    }


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
