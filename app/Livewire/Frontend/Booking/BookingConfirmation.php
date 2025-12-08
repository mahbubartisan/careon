<?php

namespace App\Livewire\Frontend\Booking;

use Livewire\Component;

class BookingConfirmation extends Component
{

    public function render()
    {
        return view('livewire.frontend.booking.booking-confirmation')->extends('livewire.frontend.layouts.app');
    }
}
