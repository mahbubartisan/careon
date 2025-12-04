<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;


class Dashboard extends Component
{
    #[Title('Dashboard')]

    public function render()
    {
        // $counts = DB::selectOne("
        //             SELECT 
        //                 (SELECT COUNT(*) FROM matches) AS totalMatches,
        //                 (SELECT COUNT(*) FROM tournaments) AS totalTournaments,
        //                 (SELECT COUNT(*) FROM sponsors) AS totalSponsors,
        //                 (SELECT COUNT(*) 
        //                 FROM team_player 
        //                 WHERE team_id = 1) AS totalPlayers,
        //                 (SELECT COUNT(*) FROM news) AS totalNews,
        //                 (SELECT COUNT(*) FROM teams) AS totalTeams,
        //                 (SELECT COUNT(*) FROM districts) AS totalDistricts,
        //                 (SELECT COUNT(*) FROM thanas) AS totalThanas
        //         ");

        // $totalMatches = $counts->totalMatches;
        // $totalTournaments = $counts->totalTournaments;
        // $totalSponsors = $counts->totalSponsors;
        // $totalPlayers = $counts->totalPlayers;
        // $totalNews = $counts->totalNews;
        // $totalTeams = $counts->totalTeams;
        // $totalDistricts = $counts->totalDistricts;
        // $totalThanas = $counts->totalThanas;

        return view('livewire.backend.dashboard', [
            // 'totalMatches' => $totalMatches,
            // 'totalTournaments' => $totalTournaments,
            // 'totalSponsors' => $totalSponsors,
            // 'totalPlayers' => $totalPlayers,
            // 'totalTeams' => $totalTeams,
            // 'totalNews' => $totalNews,
            // 'totalDistricts' => $totalDistricts,
            // 'totalThanas' => $totalThanas,
        ])->extends('livewire.backend.layouts.app');
    }
}
