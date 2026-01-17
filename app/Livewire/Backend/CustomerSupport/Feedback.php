<?php

namespace App\Livewire\Backend\CustomerSupport;

use App\Livewire\Forms\FeedbackForm;
use App\Models\Feedback as ModelsFeedback;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Feedback extends Component
{
    use WithPagination;

    #[Title('Feedback')]

    public FeedbackForm $form;

    public function render()
    {
        $feedbacks = ModelsFeedback::where(function ($query) {
            $query->where('name', 'like', "%{$this->form->search}%")
                ->orWhere('email', 'like', "%{$this->form->search}%")
                ->orWhere('phone', 'like', "%{$this->form->search}%");
        })
            ->latest()
            ->paginate($this->form->rowsPerPage);

        return view('livewire.backend.customer-support.feedback', [
            'feedbacks' => $feedbacks
        ])->extends('livewire.backend.layouts.app');
    }
}
