<?php

namespace App\Livewire\Backend\CustomerSupport;

use App\Livewire\Forms\GeneralInquiryForm;
use App\Models\GeneralInquiry;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class GeneralQuery extends Component
{
    use WithPagination;

    #[Title('General Form')]

    public GeneralInquiryForm $form;

    public function render()
    {
        $queries = GeneralInquiry::where(function ($query) {
            $query->where('name', 'like', '%' . $this->form->search . '%')
            ->orWhere('email', 'like', "%{$this->form->search}%")
            ->orWhere('phone', 'like', "%{$this->form->search}%");
        })
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.customer-support.general-query', [
            'queries' => $queries
        ])->extends('livewire.backend.layouts.app');
    }
}
