<?php

namespace App\Livewire\Backend\BookingManage;

use App\Livewire\Forms\BookingForm;
use App\Models\AmbulanceSupport;
use App\Models\Settings;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mpdf\Mpdf;

class AmbulanceBookingDetail extends Component
{
    #[Title('Ambulance Booking Details')]

    public BookingForm $form;
    
    public $booking;
    public $bookingId;

    public function mount($bookingId) 
    {
        $this->bookingId = $bookingId;
        $this->booking = AmbulanceSupport::with('user')->findOrFail($this->bookingId);
    }

    public function downloadInvoice()
    {
        $booking = $this->booking;

        $settings = Settings::with('siteLogo')->first();

        // Absolute path for mPDF
        $logoPath = null;

        if ($settings && $settings->siteLogo) {
            $logoPath = $settings->siteLogo->path;
        }

        $html = view('pdf.ambulance-support-invoice', [
            'booking' => $booking,
            'logoPath' => $logoPath,
        ])->render();

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'autoLangToFont' => true,
            'autoScriptToLang' => true
        ]);

        $mpdf->WriteHTML($html);

        return response()->streamDownload(
            function () use ($mpdf) {
                echo $mpdf->Output('', 'S');
            },
            'Ambulance-Support-Invoice-' . $booking->booking_id . '.pdf'
        );
    }

    public function render()
    {
        return view('livewire.backend.booking-manage.ambulance-booking-detail')->extends('livewire.backend.layouts.app');
    }
}
