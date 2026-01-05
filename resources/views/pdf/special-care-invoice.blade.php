{{-- <!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Special Service Invoice</title>

        <style>
            body {
                font-family: "Times New Roman", Times, serif;
                font-size: 13px;
                color: #1f2937;
                background: #ffffff;
            }

            .container {
                width: 100%;
                padding: 28px;
            }

            /* HEADER */
            .header-table {
                width: 100%;
                border-bottom: 2px solid #0f766e;
                margin-bottom: 18px;
            }

            .logo {
                font-size: 26px;
                font-weight: 900;
                color: #0f766e;
            }

            .invoice-title {
                text-align: right;
            }

            .invoice-title h2 {
                margin: 0;
                font-size: 18px;
                color: #374151;
            }

            .invoice-title span {
                font-size: 12px;
                color: #6b7280;
            }

            /* MAIN CARD */
            .invoice-card {
                border: 1px solid #e5e7eb;
                border-radius: 10px;
                padding: 16px;
            }

            /* SECTIONS */
            .section-title {
                font-size: 14px;
                font-weight: 700;
                color: #0f766e;
                border-left: 4px solid #0f766e;
                padding-left: 8px;
                margin: 18px 0 10px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            .info-table td {
                padding: 6px 4px;
                vertical-align: top;
            }

            .label {
                width: 32%;
                color: #6b7280;
            }

            .value {
                font-weight: 600;
                color: #111827;
            }

            /* TEST TABLE */
            .test-table th,
            .test-table td {
                border-bottom: 1px solid #e5e7eb;
                padding: 8px 6px;
                font-size: 13px;
            }

            .test-table th {
                background: #f0fdfa;
                color: #065f46;
                text-align: left;
            }

            .text-right {
                text-align: right;
            }

            /* TOTAL */
            .total-table {
                width: 100%;
                margin-top: 18px;
                border-top: 2px solid #0f766e;
                padding-top: 10px;
            }

            .total-label {
                text-align: right;
                font-size: 14px;
                font-weight: 700;
                color: #065f46;
                padding-right: 10px;
            }

            .total-amount {
                text-align: right;
                font-size: 26px;
                font-weight: 900;
                color: #0f766e;
            }

            /* FOOTER */
            .footer {
                margin-top: 28px;
                text-align: center;
                font-size: 11px;
                color: #6b7280;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <!-- HEADER -->
            <table class="header-table">
                <tr>
                    <td>
                        <div class="logo">
                            <img src="{{ $logoPath }}" alt="CareOn" style="height: 50px;">
                        </div>
                    </td>
                    <td class="invoice-title"
                        style="width:100%; border-bottom:2px solid #0f766e; padding-bottom:10px; margin-bottom:18px;">
                        <h2 style="margin:0; font-size:18px; color:#0c0c0c;">
                            Special Service Invoice
                        </h2>

                        <table style="width:100%; margin-top:6px;">
                            <tr>
                                <td style="font-size:12px; color:#1c1d1e; text-align:right;">
                                    <strong>Invoice Date:</strong>
                                    {{ now()->format("F d, Y") }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <!-- BOOKING INFORMATION -->
            <div class="section-title">Booking Information</div>
            <table>
                <tr>
                    <td class="label">Booking ID</td>
                    <td class="value">#{{ $booking->booking_id }}</td>
                </tr>
                <tr>
                    <td class="label">Service</td>
                    <td class="value">{{ $booking->service_name }}</td>
                </tr>
                <tr>
                    <td class="label">Package</td>
                    <td class="value">{{ $booking->package_name }}</td>
                </tr>
                <tr>
                    <td class="label">Care Level</td>
                    <td class="value">{{ $booking->care_level_name }} ({{ $booking->hours }} hrs)</td>
                </tr>
                <tr>
                    <td class="label">Location</td>
                    <td class="value">{{ $booking->location_group }}</td>
                </tr>
                <tr>
                    <td class="label">Date & Time</td>
                    <td class="value">
                        {{ \Carbon\Carbon::parse($booking->date)->format("F j, Y") }} •
                        {{ \Carbon\Carbon::parse($booking->time)->format("g:i A") }}
                    </td>
                </tr>
            </table>

            <!-- PATIENT INFORMATION -->
            <div class="section-title">Patient Information</div>
            <table>
                <tr>
                    <td class="label">Patient Name</td>
                    <td class="value">{{ $booking->patient->name }}</td>
                </tr>
                <tr>
                    <td class="label">Gender</td>
                    <td class="value">{{ ucfirst($booking->patient->gender) }}</td>
                </tr>
                <tr>
                    <td class="label">Height / Weight</td>
                    <td class="value">
                        {{ $booking->patient->height }} / {{ $booking->patient->weight }} Kg
                    </td>
                </tr>
                <tr>
                    <td class="label">Patient Contact</td>
                    <td class="value">{{ $booking->patient->patient_contact }}</td>
                </tr>
                <tr>
                    <td class="label">Emergency Contact</td>
                    <td class="value">{{ $booking->patient->emergency_contact }}</td>
                </tr>
                <tr>
                    <td class="label">Address</td>
                    <td class="value">{{ $booking->patient->address }}</td>
                </tr>
                <tr>
                    <td class="label">Special Notes</td>
                    <td class="value">{{ $booking->patient->special_notes ?? "N/A" }}</td>
                </tr>
            </table>

            <!-- PAYMENT SUMMARY -->
            <div class="section-title">Payment Summary</div>
            <table>
                <tr>
                    <td class="label">Payment Type</td>
                    <td class="value">{{ $booking->payment_method }}</td>
                </tr>
                <tr>
                    <td class="label">Transaction ID</td>
                    <td class="value">{{ $booking->trx_id ?? "N/A" }}</td>
                </tr>
                <tr>
                    <td class="label">Care Price</td>
                    <td class="value">৳ {{ number_format($booking->price) }}</td>
                </tr>
                <tr>
                    <td class="label">Location Fee</td>
                    <td class="value">৳ {{ number_format($booking->location_price) }}</td>
                </tr>
            </table>

            <!-- TOTAL -->
            <table class="total-table">
                <tr>
                    <td class="total-label">Total Amount :</td>
                    <td class="total-amount">৳ {{ number_format($booking->total_price) }}</td>
                </tr>
            </table>

            <!-- FOOTER -->
            <div class="footer">
                This invoice is system generated and does not require a signature.<br>
                © {{ date("Y") }} CareOn. All rights reserved.
            </div>

        </div>

    </body>

</html> --}}
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Special Service Invoice</title>

        <style>
            body {
                font-family: "Times New Roman", Times, serif;
                font-size: 13px;
                color: #1f2937;
                background: #ffffff;
            }

            .container {
                width: 100%;
                padding: 28px;
            }

            /* HEADER */
            .header-table {
                width: 100%;
                border-bottom: 2px solid #0f766e;
                margin-bottom: 18px;
            }

            .logo {
                font-size: 26px;
                font-weight: 900;
                color: #0f766e;
            }

            .invoice-title {
                text-align: right;
            }

            .invoice-title h2 {
                margin: 0;
                font-size: 18px;
                color: #374151;
            }

            .invoice-title span {
                font-size: 12px;
                color: #6b7280;
            }

            /* MAIN CARD */
            .invoice-card {
                border: 1px solid #e5e7eb;
                border-radius: 10px;
                padding: 16px;
            }

            /* SECTIONS */
            .section-title {
                font-size: 14px;
                font-weight: 700;
                color: #0f766e;
                border-left: 4px solid #0f766e;
                padding-left: 8px;
                margin: 18px 0 10px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            .info-table td {
                padding: 6px 4px;
                vertical-align: top;
            }

            .label {
                width: 32%;
                color: #6b7280;
            }

            .value {
                font-weight: 600;
                color: #111827;
            }

            /* TEST TABLE */
            .test-table th,
            .test-table td {
                border-bottom: 1px solid #e5e7eb;
                padding: 8px 6px;
                font-size: 13px;
            }

            .test-table th {
                background: #f0fdfa;
                color: #065f46;
                text-align: left;
            }

            .text-right {
                text-align: right;
            }

            /* TOTAL */
            .total-table {
                width: 100%;
                margin-top: 18px;
                border-top: 2px solid #0f766e;
                padding-top: 10px;
            }

            .total-label {
                text-align: right;
                font-size: 14px;
                font-weight: 700;
                color: #065f46;
                padding-right: 10px;
            }

            .total-amount {
                text-align: right;
                font-size: 26px;
                font-weight: 900;
                color: #0f766e;
            }

            /* FOOTER */
            .footer {
                margin-top: 28px;
                text-align: center;
                font-size: 11px;
                color: #6b7280;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <!-- HEADER -->
            <table class="header-table">
                <tr>
                    <td>
                        <div class="logo">
                            <img src="{{ $logoPath }}" alt="CareOn" style="height: 50px;">
                        </div>
                    </td>
                    <td class="invoice-title"
                        style="width:100%; border-bottom:2px solid #0f766e; padding-bottom:10px; margin-bottom:18px;">
                        <h2 style="margin:0; font-size:18px; color:#0c0c0c;">
                            Special Service Invoice
                        </h2>

                        <table style="width:100%; margin-top:6px;">
                            <tr>
                                <td style="font-size:12px; color:#1c1d1e; text-align:right;">
                                    <strong>Invoice Date:</strong>
                                    {{ now()->format("F d, Y") }}
                                </td>
                            </tr>
                            {{-- <tr>
                                <td style="font-size:12px; color:#6b7280; text-align:right;">
                                    <strong>Invoice No:</strong>
                                    INV-{{ $booking->booking_id }}
                                </td>
                            </tr> --}}
                        </table>
                    </td>
                </tr>
            </table>

            <!-- SINGLE CARD -->
            <div>

                <!-- BOOKING INFO -->
                <div class="section-title">Booking Information</div>
                <table class="info-table">
                    <tr>
                        <td class="label">Booking ID</td>
                        <td class="value">#{{ $booking->booking_id }}</td>
                    </tr>
                    <tr>
                        <td class="label">Service</td>
                        <td class="value">{{ $booking->service_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Package</td>
                        <td class="value">{{ $booking->package_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Care Level</td>
                        <td class="value">{{ $booking->care_level_name }} ({{ $booking->hours }} hrs)</td>
                    </tr>
                    <tr>
                        <td class="label">Location Group</td>
                        <td class="value">{{ $booking->location_group }}</td>
                    </tr>
                    <tr>
                        <td class="label">Location</td>
                        <td class="value">{{ $booking->location_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Date & Time</td>
                        <td class="value">
                            {{ \Carbon\Carbon::parse($booking->date)->format("F j, Y") }} •
                            {{ \Carbon\Carbon::parse($booking->time)->format("g:i A") }}
                        </td>
                    </tr>
                </table>

                <!-- PATIENT INFO -->
                <div class="section-title">Patient Information</div>
                <table class="info-table">
                    <tr>
                        <td class="label">Patient Name</td>
                        <td class="value">{{ $booking->patient->name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Gender</td>
                        <td class="value">{{ ucfirst($booking->patient->gender) }}</td>
                    </tr>
                    <tr>
                        <td class="label">Height / Weight</td>
                        <td class="value">
                            {{ $booking->patient->height }} / {{ $booking->patient->weight }} Kg
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Patient Contact</td>
                        <td class="value">{{ $booking->patient->patient_contact }}</td>
                    </tr>
                    <tr>
                        <td class="label">Emergency Contact</td>
                        <td class="value">{{ $booking->patient->emergency_contact }}</td>
                    </tr>
                    <tr>
                        <td class="label">Address</td>
                        <td class="value">{{ $booking->patient->address }}</td>
                    </tr>
                    <tr>
                        <td class="label">Special Notes</td>
                        <td class="value">{{ $booking->patient->special_notes ?? "N/A" }}</td>
                    </tr>
                </table>

                <!-- TESTS -->
                <div class="section-title">Payment Information</div>
                <table class="info-table">
                    <tr>
                        <td class="label">Payment Type</td>
                        <td class="value">{{ $booking->payment_method }}</td>
                    </tr>
                    @if ($booking->payment_method !== "COD")
                        <tr>
                            <td class="label">Transaction ID</td>
                            <td class="value">{{ $booking->trx_id ?? "N/A" }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td class="label">Care Price</td>
                        <td class="value">৳ {{ number_format($booking->price) }}</td>
                    </tr>
                    <tr>
                        <td class="label">Location Fee</td>
                        <td class="value">৳ {{ number_format($booking->location_price) }}</td>
                    </tr>
                </table>

                <!-- TOTAL -->
                <table class="total-table">
                    <tr>
                        <td class="total-label">Total Amount :</td>
                        <td class="total-amount">৳ {{ number_format($booking->total_price) }}</td>
                    </tr>
                </table>

            </div>

            <!-- FOOTER -->
            <div class="footer">
                This invoice is system generated and does not require a signature.<br>
                © {{ date("Y") }} CareOn. All rights reserved.
            </div>

        </div>

    </body>

</html>
