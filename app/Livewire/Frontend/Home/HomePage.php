<?php

namespace App\Livewire\Frontend\Home;

use Livewire\Attributes\Title;
use Livewire\Component;


class HomePage extends Component
{
    #[Title('CareOn - Homepage')]

    public function render()
    {
        return view('livewire.frontend.home.home-page', [
           
        ])->extends('livewire.frontend.layouts.app');
    }
}
