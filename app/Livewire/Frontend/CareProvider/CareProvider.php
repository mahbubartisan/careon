<?php

namespace App\Livewire\Frontend\CareProvider;

use App\Livewire\Forms\CareProviderForm;
use App\Models\CareProvider as ModelsCareProvider;
use App\Traits\MediaTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class CareProvider extends Component
{
    use WithFileUploads, MediaTrait;
    
    public CareProviderForm $form;
    
    public function submit()
    {
        // dd($this->form);
        // $this->form->validate();

        /** Upload Media */
        $nidMedia = $this->uploadMultipleMedia($this->form->nid, 'documents/nid');
        $nidIds = collect($nidMedia)->pluck('id')->values()->toArray();

        $licenseId = $this->form->license
            ? $this->uploadMedia($this->form->license, 'documents/license')->id
            : null;

        $trainingId = $this->form->training_certificate
            ? $this->uploadMedia($this->form->training_certificate, 'documents/training_certificate')->id
            : null;

        $policeId = $this->form->police_clearance
            ? $this->uploadMedia($this->form->police_clearance, 'documents/police_clearance')->id
            : null;

            /** Save Provider */
        ModelsCareProvider::create([
            // Personal
            'full_name' => $this->form->full_name,
            'phone' => $this->form->phone,
            'email' => $this->form->email,
            'date_of_birth' => $this->form->date_of_birth,
            'gender' => $this->form->gender,
            'nid_number' => $this->form->nid_number,
            'present_address' => $this->form->present_address,
            'permanent_address' => $this->form->permanent_address,

            // Professional
            'service_category' => $this->form->service_category,
            'experience' => $this->form->experience,
            'qualification' => $this->form->qualification,
            'qualification_status' => $this->form->qualification_status,
            
            // Availability
            'languages' => $this->form->languages,
            'availability' => $this->form->availability,

            // Media
            'nid_ids' => $nidIds,
            'license_id' => $licenseId,
            'training_id' => $trainingId,
            'police_id' => $policeId,

            'agree' => $this->form->agree,
        ]);

        $this->form->reset();

        session()->flash('success', 'Application submitted successfully!');
    }

    public function render()
    {
        return view('livewire.frontend.care-provider.care-provider')->extends('livewire.frontend.layouts.app');
    }
}
