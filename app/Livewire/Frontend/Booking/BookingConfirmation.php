<?php

namespace App\Livewire\Frontend\Booking;

use App\Models\Booking;
use Livewire\Component;

class BookingConfirmation extends Component
{
    // public $booking;

    // public function mount($booking)
    // {
    //     $this->booking = Booking::findOrFail($booking);
    // }

    public $booking;

    public function mount()
    {
        $data = session()->get('booking_confirmation');

        // dd($data);

        abort_if(! $data, 404);

        $model = $data['model'];

        $this->booking = $model::findOrFail($data['id']);
    }


    public function render()
    {
        return view('livewire.frontend.booking.booking-confirmation')->extends('livewire.frontend.layouts.app');
    }
}
