<?php

namespace App\Livewire\Frontend\Navbar;

use App\Models\Player;
use Livewire\Component;

class Navbar extends Component
{
    public $query = '';
    public $players = [];

    public function updatedQuery()
    {
        // $this->players = Player::with('media')
        //     ->select('id', 'first_name_en', 'first_name_bn', 'last_name_en', 'last_name_bn', 'slug', 'photo', 'playing_role')
        //     ->where(function ($q) {
        //         $q->where('first_name_en', 'like', '%' . $this->query . '%')
        //             ->orWhere('last_name_en', 'like', '%' . $this->query . '%');
        //     })
        //     ->take(10)
        //     ->get()
        //     ->unique('id')
        //     ->values();
    }

    public function render()
    {
        return view('livewire.frontend.layouts.navbar');
    }
}
