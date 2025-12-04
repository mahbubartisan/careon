<?php

namespace App\Livewire\Backend\Package;

use App\Livewire\Forms\PackageForm;
use App\Models\Package;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreatePackage extends Component
{
    #[Title('Create Package')]

    public PackageForm $form;

    public function store()
    {
        // Validate the form
        $this->validate();

        // Save the Package data
        Package::create([
            'name' => $this->form->name,
        ]);

        // flash success message
        session()->flash('success', 'Package created successfully!');
        return redirect()->route('package');
    }

    public function render()
    {
        return view('livewire.backend.package.create-package')->extends('livewire.backend.layouts.app');
    }
}
