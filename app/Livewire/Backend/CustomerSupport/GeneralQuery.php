<?php

namespace App\Livewire\Backend\CustomerSupport;

use Livewire\Component;

class GeneralQuery extends Component
{
    public function render()
    {
        return view('livewire.backend.customer-support.general-query')->extends('livewire.backend.layouts.app');
    }
}
