<?php

namespace App\Livewire\Frontend\Home;

use App\Models\Service as ModelsService;
use App\Models\ServiceType;
use App\Models\Settings;
use Livewire\Component;


class HomePage extends Component
{
    public function redirectToServiceForm($slug)
    {
        $service = ModelsService::where('slug', $slug)->firstOrFail();

        match ($service->form_key) {
            'special-care' => $this->redirectRoute('frontend.service.detail', ['slug' => $service->slug]),
            'diagnostic'   => $this->redirectRoute('frontend.service.diagnostic', ['slug' => $service->slug]),
            'ambulance'    => $this->redirectRoute('frontend.service.ambulance', ['slug' => $service->slug]),
            'appointment'  => $this->redirectRoute('frontend.service.consultation', ['slug' => $service->slug]),
            'doctor-visit'  => $this->redirectRoute('frontend.service.doctor.visit', ['slug' => $service->slug]),
            default        => abort(404),
        };
    }

    public function render()
    {
        $serviceTypes = ServiceType::with([
            'services' => function ($q) {
                $q->where('status', 1)->with('media');
            }
        ])->whereHas('services', function ($q) {
            $q->where('status', 1);
        })->get();
        
        $settings = Settings::with(['siteLogo', 'favIcon'])->first();

        return view('livewire.frontend.home.home-page', [
            'serviceTypes' => $serviceTypes,
            'settings' => $settings,
        ])->extends('livewire.frontend.layouts.app');
    }
}
