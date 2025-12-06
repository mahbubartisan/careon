<?php

namespace App\Livewire\Backend\Service;

use App\Livewire\Forms\ServiceForm;
use App\Models\CareLevel;
use App\Models\CareOption;
use App\Models\Service;
use App\Models\ServiceCareLevel;
use App\Traits\MediaTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditService extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit Service')]

    public ServiceForm $form;

    public function mount($serviceId = null)
    {
        $this->form->serviceId = $serviceId;
        $this->form->careLevels = CareLevel::select('id', 'name')->get();

        if ($this->form->serviceId) {
            $service = Service::with([
                'serviceCareLevels'
            ])->findOrFail($this->form->serviceId);
            // $service = Service::with([
            //     'serviceCareLevels.careLevel.careOptions'
            // ])->findOrFail($this->form->serviceId);

            $this->form->name = $service->name;
            $this->form->short_desc = $service->short_desc;
            $this->form->badge = (bool) $service->badge;

            // Store into form.care_levels
            $this->form->care_levels = $service->serviceCareLevels->map(function ($item) {
                return [
                    'care_level_id' => $item->care_level_id,
                    'desc'          => $item->description,
                    // 'options'       => $item->careLevel->careOptions->map(fn($option) => [
                    //     'id'    => $option->id,
                    //     'hours' => $option->hours,
                    //     'price' => $option->price,
                    // ])->toArray()
                ];
            })->toArray();
        } else {
            // also store inside form
            $this->form->care_levels = [
                [
                    'care_level_id' => '',
                    'desc' => '',
                    // 'options' => [
                    //     ['hours' => '', 'price' => '']
                    // ]
                ],
                [
                    'care_level_id' => '',
                    'desc' => '',
                    // 'options' => [
                    //     ['hours' => '', 'price' => '']
                    // ]
                ],
                [
                    'care_level_id' => '',
                    'desc' => '',
                    // 'options' => [
                    //     ['hours' => '', 'price' => '']
                    // ]
                ],
            ];
        }
    }

    // public function addOption($levelIndex)
    // {
    //     $this->form->care_levels[$levelIndex]['options'][] = [
    //         'hours' => null,
    //         'price' => null
    //     ];
    // }

    // public function removeOption($levelIndex, $oIndex)
    // {
    //     array_splice($this->form->care_levels[$levelIndex]['options'], $oIndex, 1);
    // }

    public function update()
    {
        $this->validate();

        DB::beginTransaction();

        try {

            $service = Service::findOrFail($this->form->serviceId);

            /* -------------------------
            1. UPDATE SERVICE
            -------------------------- */
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

            $service->update([
                'name'        => $this->form->name,
                'slug'        => str()->slug($this->form->name),
                'image'       => $newPhotoId,
                'short_desc'  => $this->form->short_desc,
                'badge'       => $this->form->badge ?? 0,
            ]);


            /* -------------------------
            2. DELETE OLD CARE DATA
            -------------------------- */
            ServiceCareLevel::where('service_id', $service->id)->delete();
            // CareOption::whereIn(
            //     'care_level_id',
            //     $this->form->careLevels->pluck('id')
            // )->delete();


            /* -------------------------
            3. RE-INSERT CARE LEVELS
            -------------------------- */
            foreach ($this->form->care_levels as $level) {
                ServiceCareLevel::create([
                    'service_id'     => $service->id,
                    'care_level_id'  => $level['care_level_id'],
                    'description'    => $level['desc'],
                ]);

                /* -------------------------
                4. RE-INSERT OPTIONS
                -------------------------- */
                // foreach ($level['options'] as $opt) {
                //     CareOption::create([
                //         'care_level_id' => $level['care_level_id'],
                //         'hours' => $opt['hours'],
                //         'price' => $opt['price'],
                //     ]);
                // }
            }


            DB::commit();

            session()->flash('success', 'Service updated successfully!');
            return redirect()->route('service');
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.backend.service.edit-service')->extends('livewire.backend.layouts.app');
    }
}
