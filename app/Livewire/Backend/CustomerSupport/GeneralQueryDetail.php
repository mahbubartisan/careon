<?php

namespace App\Livewire\Backend\CustomerSupport;

use Livewire\Component;

class GeneralQueryDetail extends Component
{
    public function render()
    {
        return view('livewire.backend.customer-support.general-query-detail')->extends('livewire.backend.layouts.app');
    }
}
