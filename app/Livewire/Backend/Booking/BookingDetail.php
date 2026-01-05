<?php

namespace App\Livewire\Backend\Booking;

use App\Livewire\Forms\BookingForm;
use App\Models\Booking;
use App\Models\Settings;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mpdf\Mpdf;

class BookingDetail extends Component
{
    #[Title('Booking Detail')]

    public BookingForm $form;

    public function mount($bookingId)
    {
        $this->form->bookingId = $bookingId;
        $this->form->booking = Booking::with('patient')->findOrFail($this->form->bookingId);
    }

    public function downloadInvoice()
    {
        $booking = $this->form->booking;

        $settings = Settings::with('siteLogo')->first();

        // Absolute path for mPDF
        $logoPath = null;

        if ($settings && $settings->siteLogo) {
            $logoPath = $settings->siteLogo->path;
        }

        $html = view('pdf.special-care-invoice', [
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
            str()->slug($booking->service_name) . '-' . now()->format('d-m-Y') . '.pdf'
        );
    }

    public function render()
    {
        return view('livewire.backend.booking.booking-detail')->extends('livewire.backend.layouts.app');
    }
}
