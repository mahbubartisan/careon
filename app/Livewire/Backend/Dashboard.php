<?php

namespace App\Livewire\Backend;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;


class Dashboard extends Component
{
    #[Title('Dashboard')]

    public function render()
    {
        $counts = DB::selectOne("
                    SELECT 
                        (SELECT COUNT(*) FROM patients) AS totalPatients,
                        (SELECT COUNT(*) FROM blogs) AS totalBlogs,
                        (SELECT COUNT(*) FROM packages) AS totalPackages
                        
                ");

        
        $totalPatients = $counts->totalPatients;
        $totalBlogs = $counts->totalBlogs;
        $totalPackages = $counts->totalPackages;
        

        return view('livewire.backend.dashboard', [
            'totalPatients' => $totalPatients,
            'totalBlogs' => $totalBlogs,
            'totalPackages' => $totalPackages,
        ])->extends('livewire.backend.layouts.app');
    }
}
