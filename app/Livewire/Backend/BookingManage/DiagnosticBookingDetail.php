<?php

namespace App\Livewire\Backend\BookingManage;

use App\Models\DiagnosticBooking;
use Livewire\Attributes\Title;
use Livewire\Component;

class DiagnosticBookingDetail extends Component
{
    #[Title('Diagnostic Booking Details')]

    public $booking;
    public $bookingId;

    public function mount($bookingId) 
    {
        $this->bookingId = $bookingId;
        $this->booking = DiagnosticBooking::with('user')->findOrFail($this->bookingId);
    }

    public function render()
    {
        return view('livewire.backend.booking-manage.diagnostic-booking-detail')->extends('livewire.backend.layouts.app');
    }
}
