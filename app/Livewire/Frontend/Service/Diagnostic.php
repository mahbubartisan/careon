<?php

namespace App\Livewire\Frontend\Service;

use App\Models\Lab;
use App\Models\MedicalTest as ModelsMedicalTest;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Diagnostic extends Component
{
    use WithPagination;

    public $search = '';
    public $service;


    public $selectedTests = [];
    public $selectedLab = null;

    protected $updatesQueryString = ['search', 'page'];

    // Reset page when searching
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function mount($slug)
    {
        $this->service = Service::with([
            'type'
        ])->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function render()
    {
        $tests = ModelsMedicalTest::where('name', 'like', "%{$this->search}%")
            ->orderBy('name')
            ->paginate(6);

        return view('livewire.frontend.service.diagnostic', [
            'tests' => $tests,
            'labs'  => Lab::orderBy('name')->get(),
            'pagination' => $this->paginationWindow($tests),
        ])->extends('livewire.frontend.layouts.app');
    }

    protected function paginationWindow($paginator)
    {
        $current = $paginator->currentPage();
        $last    = $paginator->lastPage();

        $window = 5; // how many numbers to show in center

        $start = max(1, $current - 2);
        $end   = min($last, $current + 2);

        return compact('current', 'last', 'start', 'end');
    }
}
