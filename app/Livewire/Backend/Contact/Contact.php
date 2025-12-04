<?php

namespace App\Livewire\Backend\Contact;

use App\Livewire\Forms\ContactForm;
use App\Models\Contact as ModelsContact;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class Contact extends Component
{
    use WithPagination;

    #[Title('Contact')]

    public ContactForm $form;

    public function render()
    {
        $contacts = ModelsContact::where('first_name', 'like', '%' . $this->form->search . '%')
            ->orWhere('last_name', 'like', '%' . $this->form->search . '%')
            ->orWhere('email', 'like', '%' . $this->form->search . '%')
            ->orWhere('phone', 'like', '%' . $this->form->search . '%')
            ->latest()
            ->paginate($this->form->rowsPerPage);
        return view('livewire.backend.contact.contact', [
            'contacts' => $contacts,
        ])->extends('livewire.backend.layouts.app');
    }
}
