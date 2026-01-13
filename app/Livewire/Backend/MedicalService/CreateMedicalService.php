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

class CreateMedicalService extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create Medical Service')]

    public MedicalServiceForm $form;

    public $selectedFormType = null;

    public function mount()
    {
        $this->form->serviceTypes = ServiceType::all();

        // Preselect Medical Care Services
        $this->form->service_type_id = 3;

        // $this->form->tests = [
        //     [
        //         'test_name' => '',
        //         'price' => '',
        //     ],
        // ];

        // $this->form->labs = [
        //     [
        //         'lab_name' => '',
        //     ],
        // ];

        // $this->form->labs = [
        //     ['id' => 1, 'name' => 'Popular Diagnostic Center'],
        //     ['id' => 2, 'name' => 'Amar Diagnostic Lab'],
        //     ['id' => 3, 'name' => 'IBN Sina Lab'],
        // ];

        $this->form->labs = Lab::all()->toArray();

        $this->form->tests = [
            [
                'name' => '',
                'labs' => [
                    [
                        'lab_id' => '',
                        'price' => '',
                    ],
                ],
            ],
        ];
    }

    // public function addTest(): void
    // {
    //     $this->form->tests[] = [
    //         'test_name' => '',
    //         'price' => '',
    //     ];
    // }

    // public function removeTest(int $index): void
    // {
    //     unset($this->form->tests[$index]);
    //     $this->form->tests = array_values($this->form->tests);
    // }

    // public function addLab(): void
    // {
    //     $this->form->labs[] = [
    //         'lab_name' => '',
    //     ];
    // }

    // public function removeLab(int $index): void
    // {
    //     unset($this->form->labs[$index]);
    //     $this->form->labs = array_values($this->form->labs);
    // }

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

    // public function store()
    // {
    //     $this->form->validate();

    //     DB::transaction(function () {

    //         // Image Upload
    //         $imagePath = null;
    //         if ($this->form->image) {
    //             $image = $this->uploadMedia($this->form->image, 'images/service', 80);
    //             $imagePath = $image->id;
    //         }

    //         // Create Service
    //         $service = Service::create([
    //             'service_id'      => $this->generateServiceId($this->form->service_name),
    //             'image'           => $imagePath,
    //             'service_type_id' => $this->form->service_type_id,
    //             'name'            => $this->form->service_name,
    //             'slug'            => str()->slug($this->form->service_name),
    //             'short_desc'      => $this->form->service_desc,
    //             'form_key'        => $this->form->formType,
    //             'badge'           => $this->form->badge ?? 0,
    //             'status'          => $this->form->status ?? 1,
    //         ]);

    //         /**
    //          * Insert Tests & Labs ONLY if Medical Test form
    //          */
    //         if ($this->form->formType === 'diagnostic') {

    //             // Medical Tests
    //             foreach ($this->form->tests as $test) {
    //                 MedicalTest::create([
    //                     'service_id' => $service->id,
    //                     'name'       => $test['test_name'],
    //                     'price'      => (float) $test['price'], // ensure numeric
    //                 ]);
    //             }

    //             // Labs
    //             foreach ($this->form->labs as $lab) {
    //                 Lab::create([
    //                     'service_id' => $service->id,
    //                     'name'       => $lab['lab_name'],
    //                 ]);
    //             }
    //         }
    //     });

    //     session()->flash('success', 'Service created successfully!');
    //     return redirect()->route('medical.service');
    // }


    public function store()
    {
        // $this->validate([
        //     'form.tests' => 'required|array|min:1',
        //     'form.tests.*.name' => 'required|string|max:255',
        //     'form.tests.*.labs' => 'required|array|min:1',
        //     'form.tests.*.labs.*.lab_id' => 'required|exists:labs,id',
        //     'form.tests.*.labs.*.price' => 'required|numeric|min:0',
        // ]);
        $this->form->validate();

        DB::transaction(function () {

            // Image Upload
            $imagePath = null;
            if ($this->form->image) {
                $image = $this->uploadMedia($this->form->image, 'images/service', 80);
                $imagePath = $image->id;
            }

            // Create Service
            Service::create([
                'service_id'      => $this->generateServiceId($this->form->service_name),
                'image'           => $imagePath,
                'service_type_id' => $this->form->service_type_id,
                'name'            => $this->form->service_name,
                'slug'            => str()->slug($this->form->service_name),
                'short_desc'      => $this->form->service_desc,
                'form_key'        => $this->form->formType,
                'badge'           => $this->form->badge ?? 0,
                'status'          => $this->form->status ?? 1,
            ]);

            foreach ($this->form->tests as $testData) {

                // Create or get test
                $test = MedicalTest::firstOrCreate([
                    'service_id'      => $this->generateServiceId($this->form->service_name),
                    'name' => trim($testData['name']),
                ]);

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

        session()->flash('success', 'Medical service added.');
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
        if ($value === 'diagnostic') {
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
        return view('livewire.backend.medical-service.create-medical-service')->extends('livewire.backend.layouts.app');
    }
}
