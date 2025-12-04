<?php

namespace App\Livewire\Backend\About;

use App\Models\About as ModelsAbout;
use Livewire\Component;
use Livewire\Attributes\Title;

class About extends Component
{
    #[Title('About')]

    public function render()
    {
        $abouts = ModelsAbout::with('media')->get();

        return view('livewire.backend.about.about', [
            'abouts' => $abouts
            ])->extends('livewire.backend.layouts.app');
    }
}
