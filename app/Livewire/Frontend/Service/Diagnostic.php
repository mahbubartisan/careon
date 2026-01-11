<?php

namespace App\Livewire\Frontend\Service;

use App\Livewire\Forms\DiagnosticBookingForm;
use App\Mail\DiagnosticMail;
use App\Models\DiagnosticBooking;
use App\Models\Lab;
use App\Models\MedicalTest as MedicalTest;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class Diagnostic extends Component
{
    use WithPagination;

    public DiagnosticBookingForm $form;

    public $service;
    public $selectedLab, $selectedTests = [];
    public $search = '';

    protected $updatesQueryString = ['search', 'page'];

    // Reset page when searching
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function mount($slug)
    {
        $this->service = Service::with([
            'type'
        ])->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        if (auth()->check()) {
            $this->updatedFormBookingFor('self');
        }
    }

    public function redirectToLogin()
    {
        // Validate before redirect so user sees errors
        $this->validate();

        // Redirect to login
        return redirect()->route('login');
    }

    public function book()
    {
        $this->validate();

        try {
            // Fetch selected tests
            // $tests = MedicalTest::whereIn('name', $this->selectedTests)->get();
            // Calculate total price
            $totalPrice = array_sum($this->selectedTests);
            // Generate booking ID
            $bookingId = $this->generateBookingId($this->service->name);

            // Create booking
            $booking = DiagnosticBooking::create([
                'booking_id'    => $bookingId,
                'service_name'  => $this->service->name,
                'user_id'       => auth()->id(),
                'patient_name'  => $this->form->patient_name,
                'patient_age'   => $this->form->patient_age,
                'gender'        => $this->form->gender,
                'phone'         => $this->form->phone,
                'email'         => $this->form->email,
                'address'       => $this->form->address,
                'lab'           => $this->selectedLab,
                'tests'         => $this->selectedTests, // JSON stored
                'total_price'   => $totalPrice,
                'notes'         => $this->form->notes ?? null,
            ]);


            $this->form->reset(); // Only reset form

            // Send to admin
            Mail::to(config('mail.admin_address'))
                ->send(new DiagnosticMail($booking, 'admin'));

            Mail::to($booking->email)
                ->send(new DiagnosticMail($booking, 'user'));

            session()->put('booking_confirmation', [
                'model' => get_class($booking),
                'id'    => $booking->id,
            ]);

            return redirect()->route('frontend.confirm');
        } catch (\Throwable $e) {
            report($e);
            $this->addError('general', 'Something went wrong. Please try again.');
        }
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

    public function toggleTest($name, $price)
    {
        if (isset($this->selectedTests[$name])) {
            unset($this->selectedTests[$name]);
        } else {
            $this->selectedTests[$name] = (int) $price;
        }
    }

    public function updatedFormBookingFor($value)
    {
        if ($value === 'self' && auth()->check()) {
            $user = auth()->user();

            $this->form->patient_name = $user->name ?? '';
            $this->form->email = $user->email ?? '';
            $this->form->phone = $user->phone ?? '';
            $this->form->gender = $user->gender ?? '';
            $this->form->patient_age = $user->age ?? '';
        }

        if ($value === 'other') {
            $this->resetPatientFields();
        }
    }

    protected function resetPatientFields()
    {
        $this->form->patient_name = '';
        $this->form->patient_age = '';
        $this->form->gender = '';
        $this->form->phone = '';
        $this->form->email = '';
    }

    public function render()
    {
        $tests = MedicalTest::where('name', 'like', "%{$this->search}%")
            ->orderBy('name')
            ->paginate(6);

        return view('livewire.frontend.service.diagnostic', [
            'tests' => $tests,
            'labs'  => Lab::orderBy('name')->get(),
            'pagination' => $this->paginationWindow($tests),
        ])->extends('livewire.frontend.layouts.app');
    }

    protected function paginationWindow($paginator)
    {
        $current = $paginator->currentPage();
        $last    = $paginator->lastPage();

        $window = 5; // how many numbers to show in center

        $start = max(1, $current - 2);
        $end   = min($last, $current + 2);

        return compact('current', 'last', 'start', 'end');
    }
}
