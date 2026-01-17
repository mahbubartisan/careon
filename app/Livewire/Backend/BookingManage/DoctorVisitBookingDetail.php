<?php

namespace App\Livewire\Backend\BookingManage;

use App\Models\DoctorVisit;
use Livewire\Attributes\Title;
use Livewire\Component;

class DoctorVisitBookingDetail extends Component
{
    #[Title('Doctor Visit Booking Details')]

    public $booking;
    public $bookingId;  
    
    public function mount($bookingId) 
    {
        $this->bookingId = $bookingId;
        $this->booking = DoctorVisit::with('user')->findOrFail($this->bookingId);
    }
    
    public function render()
    {
        return view('livewire.backend.booking-manage.doctor-visit-booking-detail')->extends('livewire.backend.layouts.app');
    }
}
