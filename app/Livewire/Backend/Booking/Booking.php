<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking as ModelsBooking;
use Livewire\Component;
use Livewire\WithPagination;

class Booking extends Component
{
    use WithPagination;

    public function render()
    {   $bookings = ModelsBooking::latest()->paginate(20);
        return view('livewire.backend.booking.booking', [
            'bookings' => $bookings,
        ])->extends('livewire.backend.layouts.app');
    }
}
