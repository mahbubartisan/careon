<?php

namespace App\Livewire\Backend\CustomerSupport;

use App\Livewire\Forms\GeneralInquiryForm;
use App\Models\GeneralInquiry;
use Livewire\Attributes\Title;
use Livewire\Component;

class GeneralQueryDetail extends Component
{
    #[Title('General Query Detail')]

    public GeneralInquiryForm $form;
    
    public function mount($queryId) 
    {
        $this->form->queryId = $queryId;
        $this->form->query = GeneralInquiry::findOrFail($this->form->queryId);
    }
    
    public function render()
    {
        return view('livewire.backend.customer-support.general-query-detail')->extends('livewire.backend.layouts.app');
    }
}
