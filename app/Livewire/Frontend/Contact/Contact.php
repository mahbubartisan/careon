<?php

namespace App\Livewire\Frontend\Contact;

use App\Livewire\Forms\ContactForm;
use App\Models\Contact as ModelsContact;
use Livewire\Attributes\Title;
use Livewire\Component;

class Contact extends Component
{
    #[Title('Contact Us')]

    public ContactForm $form;

    public $activeTab = 'general';

    public $general = [];
    public $feedback = [];



    public $showModal = false;


    public function submitGeneral()
    {
        $this->activeTab = 'general';

        $this->validate([
            'general.name'    => 'required',
            'general.phone'   => 'required',
            'general.email'   => 'required|email',
            'general.subject' => 'required',
            'general.message' => 'required',
        ]);

        // Save / send mail
    }

    public function submitFeedback()
    {
        $this->activeTab = 'feedback';

        $this->validate([
            'feedback.name'    => 'required',
            'feedback.phone'   => 'required',
            'feedback.email'   => 'required|email',
            'feedback.rating'  => 'required',
            'feedback.subject' => 'required',
            'feedback.message' => 'required',
        ]);

        // Save feedback
    }


    public function submit()
    {
        $this->validate();

        ModelsContact::create([
            'first_name' => $this->form->first_name,
            'last_name' => $this->form->last_name,
            'email' => $this->form->email,
            'phone' => $this->form->phone,
            'subject' => $this->form->subject,
            'message' => $this->form->message,
        ]);

        $this->reset();
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.frontend.contact.contact')->extends('livewire.frontend.layouts.app');
    }
}
