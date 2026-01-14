<?php

namespace App\Livewire\Backend\CustomerSupport;

use Livewire\Component;

class FeedbackDetail extends Component
{
    public function render()
    {
        return view('livewire.backend.customer-support.feedback-detail')->extends('livewire.backend.layouts.app');
    }
}
