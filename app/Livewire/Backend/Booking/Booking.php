<?php

namespace App\Livewire\Backend\Booking;

use App\Livewire\Forms\BookingForm;
use App\Models\Booking as ModelsBooking;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Booking extends Component
{
    use WithPagination;

    #[Title('Bookings')]
    
    public BookingForm $form;
    
    public function render()
    {
        $bookings = ModelsBooking::with('patient')
            ->when($this->form->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('id', 'like', "%{$this->form->search}%")
                        ->orWhere('date', 'like', "%{$this->form->search}%")
                        ->orWhere('time', 'like', "%{$this->form->search}%");

                    // Relationship search
                    $q->orWhereHas('patient', function ($patientQuery) {
                        $patientQuery->where('name', 'like', "%{$this->form->search}%");
                            // ->orWhere('phone', 'like', "%{$this->search}%")
                            // ->orWhere('email', 'like', "%{$this->search}%");
                    });
                });
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.booking.booking', [
            'bookings' => $bookings,
        ])->extends('livewire.backend.layouts.app');
    }
}
