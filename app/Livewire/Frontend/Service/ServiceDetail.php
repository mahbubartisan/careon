<?php

namespace App\Livewire\Frontend\Service;

use App\Models\Booking;
use App\Models\LocationGroup;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ServiceDetail extends Component
{
    public $service;
    public $packages;
    public $locationGroups;
    public $payment_method; // 'cod' or 'bkash'


    public function mount($slug)
    {
        $this->service = Service::with([
            'type',
            'serviceCareLevels',   // care level features
            'media'                  // service images
        ])->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        // Match packages' careLevels with service's careLevels

        // $serviceCareLevelIds = $this->service->careLevels->pluck('id')->toArray();

        // // load packages + their careLevels + careOptions (hours & price)
        // $this->packages = Package::with(['careLevels.careOptions'])->get()
        //     // keep only careLevels that belong to the current service
        //     ->map(function ($package) use ($serviceCareLevelIds) {
        //         $package->careLevels = $package->careLevels
        //             ->filter(fn($cl) => in_array($cl->id, $serviceCareLevelIds))
        //             ->values();
        //         return $package;
        //     });

        $this->packages = Package::with(['careLevels.careOptions'])->get();
        $this->locationGroups = LocationGroup::with('locations')->get();
    }

    public function processOrder()
    {
        dd('okk');
        if ($this->payment_method === 'cod') {
            return $this->storeOrder();   // store immediately
        }

        if ($this->payment_method === 'bkash') {
            return $this->initiateBkashPayment(); // send user to bkash
        }
    }

    public function storeOrder()
    {
        // Save service + package + care options + caregiving hours, etc.
        $order = Booking::create([
            'service_id'      => $this->service_id,
            'package_id'      => $this->package_id,
            'care_level_id'   => $this->care_level_id,
            'care_option_id'  => $this->care_option_id,
            'payment_method'  => 'COD',
            // 'payment_status'  => 'pending',
            'total'           => $this->totalPrice,
            'status'          => 'pending',
        ]);

        // return redirect()->route('order.success', $order->id);
    }

    public function initiateBkashPayment()
    {
        $amount = $this->totalPrice;

        // Hit bKash API / your own controller
        $response = Http::post('https://your-domain.com/bkash/create-payment', [
            'amount' => $amount,
        ]);

        return redirect()->away($response['bkashURL']);
    }

    public function render()
    {
        return view('livewire.frontend.service.service-detail')->extends('livewire.frontend.layouts.app');
    }
}
