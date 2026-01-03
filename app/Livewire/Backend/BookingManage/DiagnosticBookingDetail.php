<?php

namespace App\Livewire\Backend\BookingManage;

use App\Models\DiagnosticBooking;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mpdf\Mpdf;

class DiagnosticBookingDetail extends Component
{
    #[Title('Diagnostic Booking Details')]

    public $booking;
    public $bookingId;

    public function mount($bookingId)
    {
        $this->bookingId = $bookingId;
        $this->booking = DiagnosticBooking::with('user')->findOrFail($this->bookingId);
    }

    // public function downloadInvoice()
    // {
    //     $booking = $this->booking; // assuming booking is already loaded

    //     $pdf = Pdf::loadView('pdf.diagnostic-invoice', [
    //         'booking' => $booking,
    //     ])->setPaper('a4');

    //     return response()->streamDownload(
    //         fn() => print($pdf->output()),
    //         'Diagnostic-Invoice-' . $booking->booking_id . '.pdf'
    //     );
    // }

    public function downloadInvoice()
{
    $booking = $this->booking;

    $html = view('pdf.diagnostic-invoice', [
        'booking' => $booking,
    ])->render();

    $mpdf = new Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'autoLangToFont' => true,   // 🔥 REQUIRED
        'autoScriptToLang' => true // 🔥 REQUIRED
    ]);

    $mpdf->WriteHTML($html);

    return response()->streamDownload(
        function () use ($mpdf) {
            echo $mpdf->Output('', 'S');
        },
        'Diagnostic-Invoice-' . $booking->booking_id . '.pdf'
    );
}


    public function render()
    {
        return view('livewire.backend.booking-manage.diagnostic-booking-detail')->extends('livewire.backend.layouts.app');
    }
}
