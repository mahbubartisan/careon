<?php

namespace App\Livewire\Backend\Booking;

use App\Livewire\Forms\BookingForm;
use App\Models\Booking;
use Livewire\Attributes\Title;
use Livewire\Component;

class BookingDetail extends Component
{
    #[Title('Booking Detail')]
    
    public BookingForm $form;
    
    public function mount($bookingId) 
    {
        $this->form->bookingId = $bookingId;
        $this->form->booking = Booking::with('patient')->findOrFail($this->form->bookingId);
    }

    public function render()
    {
        return view('livewire.backend.booking.booking-detail')->extends('livewire.backend.layouts.app');
    }
}
