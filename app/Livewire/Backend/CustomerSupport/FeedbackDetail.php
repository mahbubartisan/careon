<?php

namespace App\Livewire\Backend\CustomerSupport;

use App\Livewire\Forms\FeedbackForm;
use App\Models\Feedback;
use Livewire\Attributes\Title;
use Livewire\Component;

class FeedbackDetail extends Component
{
    #[Title('Feedback Detail')]

    public FeedbackForm $form;
    
    public function mount($feedbackId) 
    {
        $this->form->feedbackId = $feedbackId;
        $this->form->feedback = Feedback::findOrFail($this->form->feedbackId);
    }

    public function render()
    {
        return view('livewire.backend.customer-support.feedback-detail')->extends('livewire.backend.layouts.app');
    }
}
