<?php

namespace App\Livewire\Backend\MedicalCare\MedicalTest;

use App\Livewire\Forms\MedicalTestForm;
use App\Models\Lab;
use App\Models\MedicalTest;
use App\Models\Service;
use App\Models\ServiceType;
use App\Traits\MediaTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditMedicalTest extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit Medical Test')]

    public MedicalTestForm $form;


    public function mount($serviceId)
    {
        $this->form->serviceId = $serviceId;
        
        $service = Service::with(['medicalTests', 'labs'])->findOrFail($this->form->serviceId);

        // Dropdown data
        $this->form->serviceTypes = ServiceType::all();

        // Fill service data
        $this->form->service_type_id = $service->service_type_id;
        $this->form->service_name = $service->name;
        $this->form->service_desc = $service->short_desc;

        // Fill tests
        $this->form->tests = $service->medicalTests->map(function ($test) {
            return [
                'id' => $test->id, // important for update
                'test_name' => $test->name,
                'price' => $test->price,
            ];
        })->toArray();

        // Fill labs
        $this->form->labs = $service->labs->map(function ($lab) {
            return [
                'id' => $lab->id,
                'lab_name' => $lab->name,
            ];
        })->toArray();
    }

    /* =======================
        Dynamic Add / Remove
    ======================== */

    public function addTest(): void
    {
        $this->form->tests[] = [
            'id' => null,
            'test_name' => '',
            'price' => '',
        ];
    }

    public function removeTest(int $index): void
    {
        if (isset($this->form->tests[$index]['id'])) {
            MedicalTest::where('id', $this->form->tests[$index]['id'])->delete();
        }

        unset($this->form->tests[$index]);
        $this->form->tests = array_values($this->form->tests);
    }

    public function addLab(): void
    {
        $this->form->labs[] = [
            'id' => null,
            'lab_name' => '',
        ];
    }

    public function removeLab(int $index): void
    {
        if (isset($this->form->labs[$index]['id'])) {
            Lab::where('id', $this->form->labs[$index]['id'])->delete();
        }

        unset($this->form->labs[$index]);
        $this->form->labs = array_values($this->form->labs);
    }

    /* =======================
            Update Logic
    ======================== */

    public function update()
    {
        $this->form->validate();

        DB::transaction(function () {

            // eplace image if uploaded
            if ($this->form->image) {
                $image = $this->uploadMedia($this->form->image, 'images/service', 80);
                $this->service->image = $image->id;
            }

            // Update service
            $this->service->update([
                'service_type_id' => $this->form->service_type_id,
                'name' => $this->form->service_name,
                'slug' => str()->slug($this->form->service_name),
                'short_desc' => $this->form->service_desc,
            ]);

            // Sync Medical Tests
            foreach ($this->form->tests as $test) {
                MedicalTest::updateOrCreate(
                    [
                        'id' => $test['id'] ?? null,
                    ],
                    [
                        'service_id' => $this->service->id,
                        'name' => $test['test_name'],
                        'price' => $test['price'],
                    ]
                );
            }

            // Sync Labs
            foreach ($this->form->labs as $lab) {
                Lab::updateOrCreate(
                    [
                        'id' => $lab['id'] ?? null,
                    ],
                    [
                        'service_id' => $this->service->id,
                        'name' => $lab['lab_name'],
                    ]
                );
            }
        });

        session()->flash('success', 'Medical test updated successfully!');
        return redirect()->route('medical.test');
    }

    public function render()
    {
        return view('livewire.backend.medical-care.medical-test.edit-medical-test')
            ->extends('livewire.backend.layouts.app');
    }
}
