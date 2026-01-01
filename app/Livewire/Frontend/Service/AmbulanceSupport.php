<?php

namespace App\Livewire\Frontend\Service;

use App\Livewire\Forms\AmbulanceSupportForm;
use App\Mail\AmbulanceBookingtMail;
use App\Models\AmbulanceSupport as ModelsAmbulanceSupport;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AmbulanceSupport extends Component
{
    public AmbulanceSupportForm $form;

    public $service;

    public function mount($slug)
    {
        $this->service = Service::with('type')->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        if (session()->has('ambulance_booking_form')) {
            $this->form->fill(session()->get('ambulance_booking_form'));
        }
    }

    public function redirectToLogin()
    {
        // Save form data
        session()->put('ambulance_booking_form', $this->form->toArray());

        // Save intended URL
        session()->put('url.intended', route('frontend.service.ambulance', ['slug' => $this->service->slug]));

        return redirect()->route('login');
    }

    public function book()
    {
        $this->validate();

        $bookingId = $this->generateBookingId($this->service->name);

        $booking = ModelsAmbulanceSupport::create([
            'booking_id'          => $bookingId,
            'user_id'             => auth()->id(),
            'patient_name'        => $this->form->patient_name,
            'patient_age'         => $this->form->patient_age,
            'gender'              => $this->form->gender,
            'email'               => $this->form->email,
            'contact_person'      => $this->form->contact_person,
            'phone'               => $this->form->phone,
            'pickup_address'      => $this->form->pickup_address,
            'destination_address' => $this->form->destination_address,
            'ambulance_type'      => $this->form->ambulance_type,
            'booking_type'        => $this->form->booking_type,
            'pickup_datetime'     => $this->form->pickup_datetime,
            'notes'               => $this->form->notes,
        ]);

        $this->form->reset(); // Only reset form

        // Send to admin
        Mail::to(config('mail.admin_address'))
            ->send(new AmbulanceBookingtMail($booking, 'admin'));

        Mail::to($booking->email)
            ->send(new AmbulanceBookingtMail($booking, 'user'));

        session()->forget('ambulance_booking_form');

        $this->dispatch('toastr:success', 'Request submitted successfully.');
        // session()->flash('success', 'Request submitted successfully.');
    }

    private function generateBookingId($serviceName)
    {
        // Short prefix from service name: "Nursing Care" → "NC"
        $prefix = strtoupper(
            collect(explode(' ', $serviceName))
                ->map(fn($w) => substr($w, 0, 1))
                ->join('')
        );

        // Six–digit numeric code
        $random = random_int(100000, 999999);

        return $prefix . $random;
    }

    public function render()
    {
        return view('livewire.frontend.service.ambulance-support')->extends('livewire.frontend.layouts.app');
    }
}
