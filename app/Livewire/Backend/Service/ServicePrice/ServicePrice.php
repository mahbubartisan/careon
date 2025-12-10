<?php

namespace App\Livewire\Backend\Service\ServicePrice;

use App\Livewire\Forms\ServicePriceForm;
use App\Models\CareOption;
use App\Models\Service;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ServicePrice extends Component
{
    use WithPagination;

    #[Title('Service Price')]

    public ServicePriceForm $form;

    public function render()
    {
        // $careOptionsQuery = CareOption::with(['service', 'package', 'careLevel']);

        // if ($this->form->search !== '') {
        //     $careOptionsQuery->whereHas('service', function ($q) {
        //         $q->where('name', 'like', '%' . $this->form->search . '%');
        //     })
        //         ->orWhereHas('package', function ($q) {
        //             $q->where('name', 'like', '%' . $this->form->search . '%');
        //         })
        //         ->orWhereHas('careLevel', function ($q) {
        //             $q->where('name', 'like', '%' . $this->form->search . '%');
        //         });
        // }

        // $careOptions = $careOptionsQuery->get();


        // // Group by service
        // $grouped = $careOptions->groupBy('service_id');

        // $rows = $grouped->map(function ($serviceItems) {

        //     // Group by package inside service
        //     $packages = $serviceItems->groupBy('package_id')->map(function ($packageItems) {

        //         $packageName = $packageItems->first()->package->name;

        //         // Group by care level inside package
        //         $careLevels = $packageItems->groupBy('care_level_id')->map(function ($clItems) {

        //             $careLevelName = $clItems->first()->careLevel->name;

        //             // Collect hours & price for the same care level
        //             $timePrices = $clItems->map(function ($row) {
        //                 $hours = $row->hours;
        //                 $price = number_format($row->price);
        //                 return "{$hours}hrs, {$price}";
        //             })->toArray();

        //             return [
        //                 'care_level' => $careLevelName,
        //                 'time_prices' => $timePrices
        //             ];
        //         })->values()->toArray();

        //         return [
        //             'package' => $packageName,
        //             'care_levels' => $careLevels
        //         ];
        //     })->values()->toArray();

        //     return [
        //         'service' => $serviceItems->first()->service->name,
        //         'serviceId' => $serviceItems->first()->service_id,
        //         'packages' => $packages
        //     ];
        // })->values()->toArray();






        $search = trim($this->form->search);

        // 1) Build service query (we will paginate services)
        $serviceQuery = Service::query();

        if ($search !== '') {
            $serviceQuery->where(function ($q) use ($search) {
                // match service name
                $q->where('name', 'like', "%{$search}%");
                    // match package name through relation
                    // ->orWhereHas('packages', function ($q2) use ($search) {
                    //     $q2->where('name', 'like', "%{$search}%");
                    // })
                    // match care level name through careOptions -> careLevel
                    // ->orWhereHas('careOptions', function ($q3) use ($search) {
                    //     $q3->whereHas('careLevel', function ($q4) use ($search) {
                    //         $q4->where('name', 'like', "%{$search}%");
                    //     });
                    // });
            });
        }

        // 2) Paginate services using Livewire's WithPagination
        $services = $serviceQuery->orderBy('name')->paginate($this->form->rowsPerPage);

        // 3) Load careOptions only for these paginated services (eager load relationships)
        $serviceIds = $services->pluck('id')->toArray();

        $careOptions = CareOption::with(['service', 'package', 'careLevel'])
            ->whereIn('service_id', $serviceIds)
            ->get();

        // 4) Group careOptions by service_id, then package_id, then care_level_id
        // We'll build a $rows collection keyed by service in the same order as $services
        $careOptionsByService = $careOptions->groupBy('service_id');

        $rows = collect($services->items())->map(function ($service) use ($careOptionsByService) {
            // care options for this service (Collection) or empty
            $serviceItems = $careOptionsByService->get($service->id, collect());

            // Group by package
            $packages = $serviceItems->groupBy('package_id')->map(function ($packageItems) {
                $packageName = optional($packageItems->first()->package)->name ?? '—';

                // Group by care level inside package
                $careLevels = $packageItems->groupBy('care_level_id')->map(function ($clItems) {
                    $careLevelName = optional($clItems->first()->careLevel)->name ?? '—';

                    $timePrices = $clItems->map(function ($row) {
                        return "{$row->hours}hrs, " . number_format($row->price);
                    })->values()->toArray();

                    return [
                        'care_level' => $careLevelName,
                        'time_prices' => $timePrices,
                    ];
                })->values()->toArray();

                return [
                    'package' => $packageName,
                    'care_levels' => $careLevels,
                ];
            })->values()->toArray();

            return [
                'service' => $service->name,
                'serviceId' => $service->id,
                'packages' => $packages,
            ];
        })->values();

        return view('livewire.backend.service.service-price.service-price', [
            'services' => $services,
            'careOptions' => $careOptions,
            'rows' => $rows,
        ])->extends('livewire.backend.layouts.app');
    }
}
