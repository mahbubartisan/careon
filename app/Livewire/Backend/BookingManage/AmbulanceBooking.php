<?php

namespace App\Livewire\Backend\BookingManage;

use App\Livewire\Forms\BookingForm;
use App\Models\AmbulanceSupport;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class AmbulanceBooking extends Component
{
    use WithPagination;

    #[Title('Ambulance Bookings')]

    public BookingForm $form;

    public function render()
    {
        $bookings = AmbulanceSupport::with('user')
            ->when($this->form->search, function ($query) {
                $search = $this->form->search;

                $query->where(function ($q) use ($search) {

                    $q->where('id', 'like', "%{$search}%")
                        ->orWhere('booking_id', 'like', "%{$search}%")
                        ->orWhere('contact_person', 'like', "%{$search}%")
                        ->orWhere('patient_name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('pickup_datetime', 'like', "%{$search}%")

                        // Search by related user name
                        ->orWhereHas('user', function ($userQuery) use ($search) {
                            $userQuery->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);
        return view('livewire.backend.booking-manage.ambulance-booking', [
            'bookings' => $bookings,
        ])->extends('livewire.backend.layouts.app');
    }
}
