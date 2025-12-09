<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BookingForm extends Form
{
    public $bookingId;
    public $booking;
    public $search = '';
    public $rowsPerPage = 20;
}
