<?php

namespace App\Livewire\Backend\BookingManage;

use App\Models\DoctorConsultation;
use Livewire\Attributes\Title;
use Livewire\Component;

class ConsultationBookingDetail extends Component
{
    #[Title('Consultation Booking Details')]

    public $booking;
    public $bookingId;  
    
    public function mount($bookingId) 
    {
        $this->bookingId = $bookingId;
        $this->booking = DoctorConsultation::with('user')->findOrFail($this->bookingId);
    }
    
    public function render()
    {
        return view('livewire.backend.booking-manage.consultation-booking-detail')->extends('livewire.backend.layouts.app');
    }
}
