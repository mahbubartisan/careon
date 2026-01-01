<?php

namespace App\Livewire\Frontend\Service;

use App\Livewire\Forms\DoctorConsultationForm;
use App\Mail\OnlineConsultationBooking;
use App\Models\DoctorConsultation as ModelsDoctorConsultation;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class DoctorConsultation extends Component
{
    public DoctorConsultationForm $form;

    public $service;

    public function mount($slug)
    {
        $this->service = Service::with('type')->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        if (session()->has('consultation_form')) {
            $this->form->fill(session()->get('consultation_form'));
        }
    }

    public function redirectToLogin()
    {
        // Save form data
        session()->put('consultation_form', $this->form->toArray());

        // Save intended URL
        session()->put('url.intended', route('frontend.service.consultation', ['slug' => $this->service->slug]));

        return redirect()->route('login');
    }

    public function book()
    {
        $this->validate();

        $bookingId = $this->generateBookingId($this->service->name);

        // Store consultation
        $booking = ModelsDoctorConsultation::create([
            'booking_id'         => $bookingId,
            'user_id'            => auth()->id(),
            'patient_name'       => $this->form->patient_name,
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
            ->send(new OnlineConsultationBooking($booking, 'admin'));

        Mail::to($booking->email)
            ->send(new OnlineConsultationBooking($booking, 'user'));

        session()->forget('consultation_form');
        // Flash success message
        session()->flash('success', 'Consultation booked successfully.');

        // Redirect to confirmation page with ID
        // return redirect()->route('consultation.confirm', [
        //     'booking' => $booking->id
        // ]);
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
        return view('livewire.frontend.service.doctor-consultation')->extends('livewire.frontend.layouts.app');
    }
}
