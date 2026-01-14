<?php

namespace App\Livewire\Backend\CustomerSupport;

use Livewire\Component;

class Feedback extends Component
{
    public function render()
    {
        return view('livewire.backend.customer-support.feedback')->extends('livewire.backend.layouts.app');
    }
}
