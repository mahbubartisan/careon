<?php

namespace App\Livewire\Backend\Package;

use App\Livewire\Forms\PackageForm;
use App\Models\Package;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditPackage extends Component
{
    #[Title('Edit Package')]

    public PackageForm $form;
    
    public function mount($packageId)
    {
        // Load package data using $packageId if necessary
        $this->form->packageId = $packageId;
        $package = Package::findOrFail($this->form->packageId);
        $this->form->name = $package->name;
    }
    
    public function render()
    {
        return view('livewire.backend.package.edit-package')->extends('livewire.backend.layouts.app');
    }
}
