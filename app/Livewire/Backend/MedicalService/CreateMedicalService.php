<?php

namespace App\Livewire\Backend\MedicalService;

use App\Livewire\Forms\MedicalServiceForm;
use App\Models\Lab;
use App\Models\MedicalTest;
use App\Models\Service;
use App\Models\ServiceType;
use App\Traits\MediaTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMedicalService extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create Medical Service')]

    public MedicalServiceForm $form;

    public $selectedFormType = null; // medical_test, home_service, appointment

    public function mount()
    {
        $this->form->serviceTypes = ServiceType::all();

        $this->form->tests = [
            [
                'test_name' => '',
                'price' => '',
            ],
        ];

        $this->form->labs = [
            [
                'lab_name' => '',
            ],
        ];
    }

    public function addTest(): void
    {
        $this->form->tests[] = [
            'test_name' => '',
            'price' => '',
        ];
    }

    public function removeTest(int $index): void
    {
        unset($this->form->tests[$index]);
        $this->form->tests = array_values($this->form->tests);
    }

    public function addLab(): void
    {
        $this->form->labs[] = [
            'lab_name' => '',
        ];
    }

    public function removeLab(int $index): void
    {
        unset($this->form->labs[$index]);
        $this->form->labs = array_values($this->form->labs);
    }

    public function store()
    {
        $this->form->validate();

        DB::transaction(function () {

            // Image Upload
            if ($this->form->image) {
                $image = $this->uploadMedia($this->form->image, 'images/service', 80);
                $imagePath = $image->id;
            }

            // Create Service
            $service = Service::create([
                'service_id'  => $this->generateServiceId($this->form->service_name),
                'image' => $imagePath,
                'service_type_id' => $this->form->service_type_id,
                'name' => $this->form->service_name,
                'slug' => str()->slug($this->form->service_name),
                'short_desc' => $this->form->service_desc,
                'form_key' => $this->form->formType,
                'badge' => $this->form->badge ?? 0,
                'status' => $this->form->status ?? 1,
            ]);

            // Medical Tests
            foreach ($this->form->tests as $test) {
                MedicalTest::create([
                    'service_id' => $service->id,
                    'name' => $test['test_name'],
                    'price' => $test['price'],
                ]);
            }

            // Labs
            foreach ($this->form->labs as $lab) {
                Lab::create([
                    'service_id' => $service->id,
                    'name' => $lab['lab_name'],
                ]);
            }
        });

        session()->flash('success', 'Service created successfully!');
        return redirect()->route('medical.service');
    }

    private function generateServiceId($name)
    {
        // Short prefix from service name: "Nursing Care" → "NC"
        $prefix = strtoupper(
            collect(explode(' ', $name))
                ->map(fn($w) => substr($w, 0, 1))
                ->join('')
        );

        // Six–digit numeric code
        $random = random_int(100000, 999999);

        return $prefix . $random;
    }

    public function updatedFormType($value)
    {
        if ($value === 'medical-test') {
            // Initialize medical fields
            $this->form->tests = [
                ['test_name' => '', 'price' => ''],
            ];

            $this->form->labs = [
                ['lab_name' => ''],
            ];
        } else {
            // Clear medical-only data
            $this->form->tests = [];
            $this->form->labs = [];
        }
    }

    public function render()
    {
        return view('livewire.backend.medical-service.create-medical-service')->extends('livewire.backend.layouts.app');
    }
}
