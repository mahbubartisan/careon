<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking;
use Livewire\Component;

class BookingDetail extends Component
{
    public $bookingId;
    public $booking;
    
    public function mount($bookingId) 
    {
        $this->bookingId = $bookingId;
        $this->booking = Booking::with('patient')->findOrFail($this->bookingId);
    }

    public function render()
    {
        return view('livewire.backend.booking.booking-detail')->extends('livewire.backend.layouts.app');
    }
}
