<?php

namespace App\Livewire\Frontend\Service;

use App\Http\Controllers\BkashTokenizePaymentController;
use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\LocationGroup;
use App\Models\Package;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class ServiceDetail extends Component
{
    public $service;
    public $packages;
    public $locationGroups;
    public $careLevels = [];
    public $careOptions = [];
    public $payment_method; // 'cod' or 'bkash'

    // Form container (single row storage)
    public $bookingForm = [
        'location' => '',
        'packageType' => '',
        'care' => '',
        'payment' => '',
        'patientName' => '',
        'gender' => '',
        'height' => '',
        'weight' => '',
        'patientType' => '',
        'country' => '',
        'patientContact' => '',
        'emergencyContact' => '',
        'address' => '',
        'genderPreference' => '',
        'language' => '',
        'specialInstructions' => '',
        'date' => '',
        'time' => '',
        'location_price' => '',
        'hours' => '',
        'price' => '',
        'total_price' => '',
        'payment_type' => '',
    ];

   
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
        // $this->packages = Package::with(['careLevels.careOptions'])->get();



        $serviceId = $this->service->id;

        $this->packages = Package::with([
            'careLevels:id,package_id,name',

            'careLevels.careOptions' => function ($q) use ($serviceId) {
                $q->where('service_id', $serviceId)
                    ->select('id', 'service_id', 'package_id', 'care_level_id', 'hours', 'price');
            }

        ])->select('id', 'name')->get();



        // dd($this->packages);

        $this->locationGroups = LocationGroup::with('locations')->get();
    }

    public function processOrder()
    {
        // Make sure the index exists
        $paymentType = $this->bookingForm['payment_type'] ?? null;

        // COD → store order immediately
        if ($paymentType === 'COD') {
            return $this->storeOrder();
        }

        // bKash → redirect to payment flow
        if ($paymentType === 'bkash') {
            return $this->initiateBkashPayment($this->generateBookingId($this->service->name));
        }

        // Optional: handle unknown payment types
        throw new \Exception("Invalid payment type selected.");
    }

    public function storeOrder()
    {
        $data = $this->bookingForm;

        $carePrice      = $this->getCarePrice($data['packageType'], $data['care']);
        $locationPrice  = $this->getLocationPrice($data['location']);
        $totalPrice     = $this->getTotalPrice($data['packageType'], $data['care'], $data['location']);

        $bookingId = $this->generateBookingId($this->service->name);

        $booking = Booking::create([
            'booking_id'        => $bookingId,
            'user_id'           => auth()->id(),
            'service_name'      => $this->service->name,
            'package_name'      => $this->getPackageName($data['packageType']),
            'care_level_name'   => $this->getCareLevelName($data['care']),
            'hours'             => $this->getHours($data['care']),
            'price'             => $carePrice,
            'location_price'    => $locationPrice,
            'total_price'       => $totalPrice,
            'location_group'    => $this->getLocationGroup($data['location']),
            'location_name'     => $data['location'],
            'date'              => $data['date'],
            'time'              => $this->formatTimeToAmPm($data['time']),
            'payment_method'    => $data['payment_type'],
        ]);

        Patient::create([
            'booking_id'         => $booking->id,
            'name'               => $data['patientName'],
            'gender'             => $data['gender'],
            'height'             => $data['height'],
            'weight'             => $data['weight'],
            'patient_type'       => $data['patientType'],
            'country'            => $data['country'],
            'patient_contact'    => $data['patientContact'],
            'emergency_contact'  => $data['emergencyContact'],
            'address'            => $data['address'],
            'gender_preference'  => $data['genderPreference'],
            'language'           => $data['language'],
            'special_notes'      => $data['specialInstructions'],
        ]);


        $adminEmail = 'admin@example.com';

        // Send to user
        Mail::to(auth()->user()->email)
            ->send(new BookingMail($booking));

        // Send to admin
        Mail::to($adminEmail)
            ->send(new BookingMail($booking));

        // session()->flash('success', 'Booking successful!');
        session()->put('booking_id', $booking->id);
        return redirect()->route('frontend.confirmation');
    }

    public function initiateBkashPayment($bookingId)
    {
        $data = $this->bookingForm;

        dd($data);

        // Calculate all needed values
        // $carePrice     = $this->getCarePrice($data['packageType'], $data['care']);
        // $locationPrice = $this->getLocationPrice($data['location']);
        // $hours         = $this->getHours($data['care']);
        // $totalPrice    = $this->getTotalPrice($data['packageType'], $data['care'], $data['location']);

        // // Extra values you requested
        // $serviceName     = $this->service->name;
        // $locationGroup   = $this->getLocationGroup($data['location']);
        // $packageName     = $this->getPackageName($data['packageType']);
        // $careLevelName   = $this->getCareLevelName($data['care']);

        // // Call controller
        // $controller = app(BkashTokenizePaymentController::class);

        // $response = $controller->createPayment(new \Illuminate\Http\Request([
        //     'booking_id'        => $bookingId,
        //     'total_price'       => $totalPrice,
        //     'care_price'        => $carePrice,
        //     'location_price'    => $locationPrice,
        //     'hours'             => $hours,

        //     // NEWLY ADDED FIELDS
        //     'service_name'      => $serviceName,
        //     'location_group'    => $locationGroup,
        //     'package_name'      => $packageName,
        //     'care_level_name'   => $careLevelName,

        //     // Full form
        //     'booking_form'      => $this->bookingForm,
        // ]));

        // return $response;
    }

    private function generateBookingId($serviceName)
    {
        // Short prefix from service name: "Nursing Care" → "NC"
        $prefix = strtoupper(
            collect(explode(' ', $serviceName))
                ->map(fn($w) => substr($w, 0, 1))
                ->join('')
        );

        // Six–digit numeric code
        $random = random_int(100000, 999999);

        return $prefix . $random;
    }

    private function formatTimeToAmPm($time)
    {
        if (!$time) return null;

        return date("h:i A", strtotime($time));
    }

    private function getPackageName($packageId)
    {
        $package = $this->packages->firstWhere('id', $packageId);
        return $package?->name ?? '';
    }

    private function getCareLevelName($careValue)
    {
        if (!$careValue) return '';

        [$levelId, $optionId] = explode('-', $careValue);

        foreach ($this->packages as $package) {
            $level = $package->careLevels->firstWhere('id', $levelId);

            if ($level) {
                return $level->name;
            }
        }

        return '';
    }

    private function getHours($careValue)
    {
        if (!$careValue) return '';

        [$levelId, $optionId] = explode('-', $careValue);

        foreach ($this->packages as $package) {
            $level = $package->careLevels->firstWhere('id', $levelId);

            if ($level) {
                $option = $level->careOptions->firstWhere('id', $optionId);
                return $option?->hours ?? '';
            }
        }

        return '';
    }

    private function getLocationGroup($locationName)
    {
        foreach ($this->locationGroups as $group) {
            if ($group->locations->contains('name', $locationName)) {
                return $group->name;
            }
        }

        return '';
    }

    private function getCarePrice($packageId, $careValue)
    {
        if (!$packageId || !$careValue) return 0;

        [$levelId, $optionId] = explode('-', $careValue);

        $package = $this->packages->firstWhere('id', $packageId);
        if (!$package) return 0;

        $level = $package->careLevels->firstWhere('id', $levelId);
        if (!$level) return 0;

        $option = $level->careOptions->firstWhere('id', $optionId);
        return $option?->price ?? 0;
    }

    private function getLocationPrice($locationName)
    {
        if (!$locationName) return 0;

        foreach ($this->locationGroups as $group) {
            if ($group->locations->contains('name', $locationName)) {
                return $group->price ?? 0;
            }
        }

        return 0;
    }

    private function getTotalPrice($packageId, $careValue, $locationName)
    {
        $carePrice = $this->getCarePrice($packageId, $careValue);
        $locationPrice = $this->getLocationPrice($locationName);

        return $carePrice + $locationPrice;
    }

    public function render()
    {
        return view('livewire.frontend.service.service-detail')->extends('livewire.frontend.layouts.app');
    }
}
