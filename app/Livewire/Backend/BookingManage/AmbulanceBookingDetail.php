<?php

namespace App\Livewire\Backend\BookingManage;

use App\Livewire\Forms\BookingForm;
use App\Models\AmbulanceSupport;
use Livewire\Attributes\Title;
use Livewire\Component;

class AmbulanceBookingDetail extends Component
{
    #[Title('Ambulance Booking Details')]

    public BookingForm $form;
    
    public $booking;
    public $bookingId;

    public function mount($bookingId) 
    {
        $this->bookingId = $bookingId;
        $this->booking = AmbulanceSupport::with('user')->findOrFail($this->bookingId);
    }

    public function render()
    {
        return view('livewire.backend.booking-manage.ambulance-booking-detail')->extends('livewire.backend.layouts.app');
    }
}
