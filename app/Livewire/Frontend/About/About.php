<?php

namespace App\Livewire\Frontend\About;

use App\Models\About as ModelsAbout;
use App\Models\Advisor;
use Livewire\Attributes\Title;
use Livewire\Component;

class About extends Component
{
    #[Title('About Us')]

    public function render()
    {
        $abouts = ModelsAbout::with('media')->get();
        $advisors = Advisor::with('media')->get();
        return view('livewire.frontend.about.about', [
            'abouts' => $abouts,
            'advisors' => $advisors,
        ])->extends('livewire.frontend.layouts.app');
    }
}
