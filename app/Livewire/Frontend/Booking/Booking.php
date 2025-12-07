<?php

namespace App\Livewire\Frontend\Booking;

use Livewire\Component;

class Booking extends Component
{

    public function render()
    {
        return view('livewire.frontend.booking.booking')->extends('livewire.frontend.layouts.app');
    }
}
