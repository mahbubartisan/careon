<?php

namespace App\Livewire\Backend\Booking;

use App\Models\Booking as ModelsBooking;
use Livewire\Component;
use Livewire\WithPagination;

class Booking extends Component
{
    use WithPagination;

    public $search = '';
    public $rowsPerPage = 20;

    public function render()
    {
        $bookings = ModelsBooking::with('patient')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('id', 'like', "%{$this->search}%")
                        ->orWhere('date', 'like', "%{$this->search}%")
                        ->orWhere('time', 'like', "%{$this->search}%");

                    // Relationship search
                    $q->orWhereHas('patient', function ($patientQuery) {
                        $patientQuery->where('name', 'like', "%{$this->search}%");
                            // ->orWhere('phone', 'like', "%{$this->search}%")
                            // ->orWhere('email', 'like', "%{$this->search}%");
                    });
                });
            })
            ->latest()
            ->paginate($this->rowsPerPage);

        return view('livewire.backend.booking.booking', [
            'bookings' => $bookings,
        ])->extends('livewire.backend.layouts.app');
    }
}
