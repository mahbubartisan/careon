<?php

namespace App\Livewire\Backend\BookingManage;

use App\Livewire\Forms\BookingForm;
use App\Models\DoctorVisit;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class DoctorVisitBooking extends Component
{
    use WithPagination;

    #[Title('Doctor Visit Bookings')]

    public BookingForm $form;

    public function render()
    {
        $bookings = DoctorVisit::with('user')
            ->when($this->form->search, function ($query) {
                $search = $this->form->search;

                $query->where(function ($q) use ($search) {

                    $q->where('id', 'like', "%{$search}%")
                        ->orWhere('booking_id', 'like', "%{$search}%")
                        ->orWhere('patient_name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('appointment_date', 'like', "%{$search}%")
                        ->orWhere('appointment_time', 'like', "%{$search}%")

                        // Search by related user name
                        ->orWhereHas('user', function ($userQuery) use ($search) {
                            $userQuery->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate($this->form->rowsPerPage);
        return view('livewire.backend.booking-manage.doctor-visit-booking', [
            'bookings' => $bookings,
        ])->extends('livewire.backend.layouts.app');
    }

}
