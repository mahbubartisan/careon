<?php

namespace App\Livewire\Backend\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\ContactForm;

class ContactDetail extends Component
{
    #[Title('Contact Detail')]

    public ContactForm $form;
    
    public function mount($contactId)
    {
        $this->form->contactId = $contactId;

        $contact = Contact::findOrFail($this->form->contactId);

        $this->form->fill([
            'first_name' => $contact->first_name,
            'last_name' => $contact->last_name,
            'email' => $contact->email,
            'phone' => $contact->phone,
            'subject' => $contact->subject,
            'message' => $contact->message,
        ]);
    }

    public function render()
    {
        return view('livewire.backend.contact.contact-detail')->extends('livewire.backend.layouts.app');
    }
}
