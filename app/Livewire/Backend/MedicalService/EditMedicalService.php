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

class EditMedicalService extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit Medical Service')]

    public MedicalServiceForm $form;


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
        $this->form->formType = $service->form_key;

        // Load medical data only if medical test
        if ($this->form->formType === 'medical-test') {
            $this->form->tests = $service->medicalTests->map(fn($t) => [
                'id' => $t->id,
                'test_name' => $t->test_name,
                'price' => $t->price,
            ])->toArray();

            $this->form->labs = $service->labs->map(fn($l) => [
                'id' => $l->id,
                'lab_name' => $l->lab_name,
            ])->toArray();
        }

        // // Fill tests
        // $this->form->tests = $service->medicalTests->map(function ($test) {
        //     return [
        //         'id' => $test->id, // important for update
        //         'test_name' => $test->name,
        //         'price' => $test->price,
        //     ];
        // })->toArray();

        // // Fill labs
        // $this->form->labs = $service->labs->map(function ($lab) {
        //     return [
        //         'id' => $lab->id,
        //         'lab_name' => $lab->name,
        //     ];
        // })->toArray();
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

            $service = Service::findOrFail($this->form->serviceId);

            // replace image if uploaded
            if ($this->form->image && !is_int($this->form->image)) {
                // Delete the old media if it exists
                if ($service->image) {
                    $this->deleteMedia($service->image);
                }

                // Upload the new image
                $newPhoto = $this->uploadMedia(
                    $this->form->image,
                    'images/service',
                    80
                );

                $newPhotoId = $newPhoto->id;
            } else {
                $newPhotoId = $service->image; // keep the existing image
            }


            // Update service
            $service->update([
                'service_type_id' => $this->form->service_type_id,
                'name' => $this->form->service_name,
                'slug' => str()->slug($this->form->service_name),
                'image'       => $newPhotoId,
                'short_desc' => $this->form->service_desc,
                'badge' => $this->form->badge ?? 0,
            ]);

            // Sync Medical Tests
            foreach ($this->form->tests as $test) {
                MedicalTest::updateOrCreate(
                    [
                        'id' => $test['id'] ?? null,
                    ],
                    [
                        'service_id' => $service->id,
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
                        'service_id' => $service->id,
                        'name' => $lab['lab_name'],
                    ]
                );
            }
        });

        session()->flash('success', 'Service updated successfully!');
        return redirect()->route('medical.service');
    }

    public function updatedFormType($value)
    {
        if ($value === 'medical-test') {
            // If switching TO medical test
            if (empty($this->form->tests)) {
                $this->form->tests = [
                    ['test_name' => '', 'price' => ''],
                ];
            }

            if (empty($this->form->labs)) {
                $this->form->labs = [
                    ['lab_name' => ''],
                ];
            }
        } else {
            // Switching AWAY from medical test
            $this->form->tests = [];
            $this->form->labs = [];
        }
    }

    public function render()
    {
        return view('livewire.backend.medical-service.edit-medical-service')
            ->extends('livewire.backend.layouts.app');
    }
}
