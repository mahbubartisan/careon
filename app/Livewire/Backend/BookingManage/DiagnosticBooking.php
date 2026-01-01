<?php

namespace App\Livewire\Backend\BookingManage;

use App\Livewire\Forms\BookingForm;
use App\Models\DiagnosticBooking as ModelsDiagnosticBooking;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class DiagnosticBooking extends Component
{
    use WithPagination;

    #[Title('Diagnostic Bookings')]

    public BookingForm $form;

    public function render()
    {
        $bookings = ModelsDiagnosticBooking::with('user')
            ->when($this->form->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('id', 'like', "%{$this->form->search}%")
                        ->orWhere('booking_id', 'like', "%{$this->form->search}%");
                    // ->orWhere('contact_person', 'like', "%{$this->form->search}%")
                    // ->orWhere('patient_name', 'like', "%{$this->form->search}%")
                    // ->orWhere('phone', 'like', "%{$this->form->search}%")
                    // ->orWhere('pickup_datetime', 'like', "%{$this->form->search}%");
                });
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);
        return view('livewire.backend.booking-manage.diagnostic-booking', [
            'bookings' => $bookings,
        ])->extends('livewire.backend.layouts.app');
    }
}
