<?php

namespace App\Livewire\Frontend\Contact;

use App\Livewire\Forms\ContactForm;
use App\Livewire\Forms\FeedbackForm;
use App\Livewire\Forms\GeneralInquiryForm;
use App\Mail\FeedbackMail;
use App\Mail\GeneralInquiryMail;
use App\Models\Contact as ModelsContact;
use App\Models\Feedback;
use App\Models\GeneralInquiry;
use App\Models\Service;
use App\Models\Settings;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Title;
use Livewire\Component;

class Contact extends Component
{
    #[Title('Contact Us')]

    public GeneralInquiryForm $generalForm;
    public FeedbackForm $feedbackForm;

    public $activeTab = 'general';

    public $general = [];
    public $feedback = [];
    public $services;
    public $settings;

    public $showModal = false;
    
    public function mount()
    {
        $this->services = Service::where('status', 1)->get(['id', 'name', 'status']);
        $this->settings = Settings::first();
    }

    public function submitGeneralInquiry()
    {
        $this->activeTab = 'general';

        $this->generalForm->validate();

        // Store inquiry
        $inquiry = GeneralInquiry::create([
            'name'    => $this->generalForm->name,
            'phone'   => $this->generalForm->phone,
            'email'   => $this->generalForm->email,
            'subject' => $this->generalForm->subject,
            'message' => $this->generalForm->message,
        ]);

        // Send mail to admin
        Mail::to(config('mail.admin_address'))
            ->send(new GeneralInquiryMail($inquiry));

        // Reset form
        $this->generalForm->reset();
        $this->showModal = true;
        return redirect()->back();

    }

    public function submitFeedback()
    {
        $this->activeTab = 'feedback';

        $this->feedbackForm->validate();

        // Store inquiry
        $feedback = Feedback::create([
            'name'    => $this->feedbackForm->name,
            'phone'   => $this->feedbackForm->phone,
            'email'   => $this->feedbackForm->email,
            'service' => $this->feedbackForm->service,
            'rating'   => $this->feedbackForm->rating,
            'subject' => $this->feedbackForm->subject,
            'message' => $this->feedbackForm->message,
        ]);

        // Send mail to admin
        Mail::to(config('mail.admin_address'))
            ->send(new FeedbackMail($feedback));

        // Reset form
        $this->feedbackForm->reset();
        $this->showModal = true;
        return redirect()->back();
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
