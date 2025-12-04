<?php

namespace App\Livewire\Frontend\Contact;

use App\Models\Contact as ModelsContact;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\ContactForm;

class Contact extends Component
{
    #[Title('Contact Us')]

    public ContactForm $form;

    public $showModal = false;

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
