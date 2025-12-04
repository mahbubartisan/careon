<?php

namespace App\Livewire\Backend\Package;

use App\Livewire\Forms\PackageForm;
use App\Models\Package as ModelsPackage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Package extends Component
{
    use WithPagination;

    #[Title('Package')]

    public PackageForm $form;

    public function delete($id)
    {
        $package = ModelsPackage::findOrFail($id);

        $package->delete();

        session()->flash('success', 'Package deleted successfully!');
        return redirect()->route('package');
    }


    public function render()
    {
        $packages = ModelsPackage::where('name', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.package.package', [
            'packages' => $packages
        ])->extends('livewire.backend.layouts.app');
    }
}
