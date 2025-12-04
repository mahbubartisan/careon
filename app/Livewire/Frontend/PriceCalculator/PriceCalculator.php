<?php

namespace App\Livewire\Frontend\PriceCalculator;

use App\Models\CareLevel;
use App\Models\CareOption;
use App\Models\Location;
use App\Models\Package;
use Livewire\Component;

class PriceCalculator extends Component
{
    public $locations = [];
    public $packages = [];
    public $careLevels = [];
    public $hours = [];

    // Selected Fields
    public $selectedLocation = null;
    public $selectedPackage = null;
    public $selectedCareLevel = null;
    public $selectedHours = null;

    // Calculated Values
    public $basePrice = 0;
    public $locationCharge = 0;

    public function mount()
    {
        $this->locations = Location::select('id', 'name')->get();
        $this->packages = \App\Models\Package::select('id', 'name')->get();
        $this->careLevels = \App\Models\CareLevel::select('id', 'name')->get();

        $this->hours = [8, 12, 24];
    }

    public function updated($field)
    {
        $this->calculatePrice();
    }

    public function calculatePrice()
    {
        // --------------------------
        // LOCATION CHARGE
        // --------------------------
        if ($this->selectedLocation) {
            $location = Location::with('group')->find($this->selectedLocation);
            $this->locationCharge = $location->group->price ?? 0;
        } else {
            $this->locationCharge = 0;
        }

        // --------------------------
        // BASE PRICE (from care_options)
        // --------------------------
        if ($this->selectedPackage && $this->selectedCareLevel && $this->selectedHours) {

            $option = CareOption::where('package_id', $this->selectedPackage)
                ->where('care_level_id', $this->selectedCareLevel)
                ->where('hours', $this->selectedHours)
                ->first();

            $this->basePrice = $option->price ?? 0;

        } else {
            $this->basePrice = 0;
        }
    }

    public function render()
    {
        return view('livewire.frontend.price-calculator.price-calculator')->extends('livewire.frontend.layouts.app');
    }
}
