<?php

namespace App\Livewire\Backend\MedicalService;

use App\Livewire\Forms\MedicalServiceForm;
use App\Models\Lab;
use App\Models\LabWiseTestPrice;
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


    // public function mount($serviceId)
    // {
    //     $this->form->serviceId = $serviceId;

    //     $service = Service::with(['diagnostics', 'labs'])->findOrFail($this->form->serviceId);

    //     // Dropdown data
    //     $this->form->serviceTypes = ServiceType::all();

    //     // Fill service data
    //     $this->form->service_type_id = $service->service_type_id;
    //     $this->form->service_name = $service->name;
    //     $this->form->service_desc = $service->short_desc;
    //     $this->form->badge = $service->badge;
    //     $this->form->formType = $service->form_key;

    //     // Load medical data only if diagnostic
    //     // if ($this->form->formType === 'diagnostic') {
    //     //     $this->form->tests = $service->diagnostics->map(fn($t) => [
    //     //         'id' => $t->id,
    //     //         'test_name' => $t->name,
    //     //         'price' => $t->price,
    //     //     ])->toArray();

    //     //     $this->form->labs = $service->labs->map(fn($l) => [
    //     //         'id' => $l->id,
    //     //         'lab_name' => $l->name,
    //     //     ])->toArray();
    //     // }

    //     // // // Fill tests
    //     // $this->form->tests = $service->medicalTests->map(function ($test) {
    //     //     return [
    //     //         'id' => $test->id, // important for update
    //     //         'test_name' => $test->name,
    //     //     ];
    //     // })->toArray();

    //     // // Fill labs
    //     // $this->form->labs = $service->labs->map(function ($lab) {
    //     //     return [
    //     //         'id' => $lab->id,
    //     //         'lab_name' => $lab->name,
    //     //     ];
    //     // })->toArray();
    // }

    public function mount($serviceId)
    {
        $this->form->serviceId = $serviceId;

        $service = Service::findOrFail($this->form->serviceId);

        // Dropdown data
        $this->form->serviceTypes = ServiceType::all();

        // Fill service data
        $this->form->service_type_id = $service->service_type_id;
        $this->form->service_name = $service->name;
        $this->form->service_desc = $service->short_desc;
        $this->form->badge = $service->badge;
        $this->form->formType = $service->form_key;

        // Load labs for dropdown
        $this->form->labs = Lab::select('id', 'name')->get()->toArray();

        // EDIT MODE
        if ($serviceId) {

            $tests = MedicalTest::whereHas('prices') // assuming prices() relation
                ->with(['prices.lab'])
                ->get();

            $this->form->tests = $tests->map(function ($test) {
                return [
                    'name' => $test->name,
                    'labs' => $test->prices->map(function ($price) {
                        return [
                            'lab_id' => (string) $price->lab_id,
                            'price'  => (string) $price->price,
                        ];
                    })->values()->toArray(),
                ];
            })->values()->toArray();
        } else {
            // CREATE MODE fallback
            $this->form->tests = [
                [
                    'name' => '',
                    'labs' => [
                        [
                            'lab_id' => '',
                            'price'  => '',
                        ],
                    ],
                ],
            ];
        }
    }

    /* =======================
        Dynamic Add / Remove
    ======================== */

    public function addTest()
    {
        $this->form->tests[] = [
            'name' => '',
            'labs' => [
                [
                    'lab_id' => '',
                    'price' => '',
                ]
            ],
        ];
    }

    public function removeTest($index)
    {
        unset($this->form->tests[$index]);
        $this->form->tests = array_values($this->form->tests);
    }

    public function addLab($testIndex)
    {
        $this->form->tests[$testIndex]['labs'][] = [
            'lab_id' => '',
            'price' => '',
        ];
    }

    public function removeLab($testIndex, $labIndex)
    {
        unset($this->form->tests[$testIndex]['labs'][$labIndex]);
        $this->form->tests[$testIndex]['labs'] = array_values(
            $this->form->tests[$testIndex]['labs']
        );
    }

    /* =======================
            Update Logic
    ======================== */

    // public function update()
    // {
    //     $this->form->validate();

    //     DB::transaction(function () {

    //         $service = Service::findOrFail($this->form->serviceId);

    //         // replace image if uploaded
    //         if ($this->form->image && !is_int($this->form->image)) {
    //             // Delete the old media if it exists
    //             if ($service->image) {
    //                 $this->deleteMedia($service->image);
    //             }

    //             // Upload the new image
    //             $newPhoto = $this->uploadMedia(
    //                 $this->form->image,
    //                 'images/service',
    //                 80
    //             );

    //             $newPhotoId = $newPhoto->id;
    //         } else {
    //             $newPhotoId = $service->image; // keep the existing image
    //         }


    //         // Update service
    //         $service->update([
    //             'service_type_id' => $this->form->service_type_id,
    //             'name' => $this->form->service_name,
    //             'slug' => str()->slug($this->form->service_name),
    //             'image'       => $newPhotoId,
    //             'short_desc' => $this->form->service_desc,
    //             'badge' => $this->form->badge ?? 0,
    //         ]);

    //         /**
    //          * Insert Tests & Labs ONLY if Medical Test form
    //          */
    //         if ($this->form->formType === 'diagnostic') {

    //             // Sync Medical Tests
    //             foreach ($this->form->tests as $test) {
    //                 MedicalTest::updateOrCreate(
    //                     [
    //                         'id' => $test['id'] ?? null,
    //                     ],
    //                     [
    //                         'service_id' => $service->id,
    //                         'name' => $test['test_name'],
    //                         'price' => $test['price'],
    //                     ]
    //                 );
    //             }

    //             // Sync Labs
    //             foreach ($this->form->labs as $lab) {
    //                 Lab::updateOrCreate(
    //                     [
    //                         'id' => $lab['id'] ?? null,
    //                     ],
    //                     [
    //                         'service_id' => $service->id,
    //                         'name' => $lab['lab_name'],
    //                     ]
    //                 );
    //             }
    //         }
    //     });

    //     session()->flash('success', 'Service updated successfully!');
    //     return redirect()->route('medical.service');
    // }

    public function update()
    {
        // $this->validate([
        //     'form.tests' => 'required|array|min:1',
        //     'form.tests.*.name' => 'required|string|max:255',
        //     'form.tests.*.labs' => 'required|array|min:1',
        //     'form.tests.*.labs.*.lab_id' => 'required|exists:labs,id',
        //     'form.tests.*.labs.*.price' => 'required|numeric|min:0',
        // ]);

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

            // Update Medical Test & Lab Prices
            foreach ($this->form->tests as $testData) {

                // Get or create test
                $test = MedicalTest::firstOrCreate([
                    'name' => trim($testData['name']),
                ]);

                // Track lab IDs coming from form
                $incomingLabIds = collect($testData['labs'])
                    ->pluck('lab_id')
                    ->map(fn($id) => (int) $id)
                    ->toArray();

                // Remove labs that were deleted in UI
                LabWiseTestPrice::where('test_id', $test->id)
                    ->whereNotIn('lab_id', $incomingLabIds)
                    ->delete();

                // Update or create prices
                foreach ($testData['labs'] as $labData) {
                    LabWiseTestPrice::updateOrCreate(
                        [
                            'test_id' => $test->id,
                            'lab_id'  => (int) $labData['lab_id'],
                        ],
                        [
                            'price' => (float) $labData['price'],
                        ]
                    );
                }
            }
        });

        session()->flash('success', 'Medical service updated.');
        return redirect()->route('medical.service');
    }

    public function updatedFormType($value)
    {
        if ($value === 'diagnostic') {
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

    public function toggleBadge($value)
    {
        // If clicking the same badge → deselect
        if ($this->form->badge == $value) {
            $this->form->badge = null;
        } else {
            $this->form->badge = $value;
        }
    }

    public function render()
    {
        return view('livewire.backend.medical-service.edit-medical-service')
            ->extends('livewire.backend.layouts.app');
    }
}
