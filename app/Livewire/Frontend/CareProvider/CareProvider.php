<?php

namespace App\Livewire\Frontend\CareProvider;

use Livewire\Component;

class CareProvider extends Component
{
    public function render()
    {
        return view('livewire.frontend.care-provider.care-provider')->extends('livewire.frontend.layouts.app');
    }
}
