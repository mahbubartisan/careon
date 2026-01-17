<?php

namespace App\Livewire\Frontend\Service;

use App\Livewire\Forms\DoctorVisitForm;
use App\Mail\DoctorVisitMail;
use App\Models\DoctorVisit as ModelsDoctorVisit;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class DoctorVisit extends Component
{
    public DoctorVisitForm $form;

    public $service;

    public function mount($slug)
    {
        $this->service = Service::with('type')->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        if (session()->has('doctor_visit_form')) {
            $this->form->fill(session()->get('doctor_visit_form'));
        }

        if (auth()->check()) {
            $this->updatedFormBookingFor('self');
        }
    }

    public function redirectToLogin()
    {
        // Save form data
        session()->put('doctor_visit_form', $this->form->toArray());

        // Save intended URL
        session()->put('url.intended', route('frontend.service.consultation', ['slug' => $this->service->slug]));

        return redirect()->route('login');
    }

    public function book()
    {
        $this->validate();

        $bookingId = $this->generateBookingId($this->service->name);

        // Store consultation
        $booking = ModelsDoctorVisit::create([
            'booking_id'         => $bookingId,
            'service_name'       => $this->service->name,
            'user_id'            => auth()->id(),
            'patient_name'       => $this->form->patient_name,
            'booking_for'        => $this->form->bookingFor ? $this->form->bookingFor : 'self',
            'patient_age'        => $this->form->patient_age,
            'gender'             => $this->form->gender,
            'phone'              => $this->form->phone,
            'email'              => $this->form->email,
            'doctor_type'        => $this->form->doctor_type,
            'appointment_date'   => $this->form->appointment_date,
            'appointment_time'   => $this->form->appointment_time,
            'problem'            => $this->form->problem,
        ]);

        $this->form->reset(); // Only reset form

        // Send to admin
        Mail::to(config('mail.admin_address'))
            ->send(new DoctorVisitMail($booking, 'admin'));

        Mail::to($booking->email)
            ->send(new DoctorVisitMail($booking, 'user'));

        session()->forget('doctor_visit_form');

        session()->put('booking_confirmation', [
            'model' => get_class($booking),
            'id'    => $booking->id,
        ]);

        return redirect()->route('frontend.confirm');
    }

    private function generateBookingId($serviceName)
    {
        // Short prefix from service name
        $prefix = strtoupper(
            collect(explode(' ', $serviceName))
                ->map(fn($w) => substr($w, 0, 1))
                ->join('')
        );

        // Six–digit numeric code
        $random = random_int(100000, 999999);

        return $prefix . $random;
    }

    public function updatedFormBookingFor($value)
    {
        if ($value === 'self' && auth()->check()) {
            $user = auth()->user();
            $this->form->patient_name = $user->name ?? '';
            $this->form->email = $user->email ?? '';
            $this->form->phone = $user->phone ?? '';
            $this->form->gender = $user->gender ?? '';
            $this->form->patient_age = $user->age ?? '';
        }

        if ($value === 'other') {
            $this->resetPatientFields();
        }
    }

    protected function resetPatientFields()
    {
        $this->form->patient_name = '';
        $this->form->patient_age = '';
        $this->form->gender = '';
        $this->form->phone = '';
        $this->form->email = '';
    }
    
    public function render()
    {
        return view('livewire.frontend.service.doctor-visit')->extends('livewire.frontend.layouts.app');
    }
}
