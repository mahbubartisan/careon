<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Special Care Invoice</title>

        <style>
            body {
                font-family: "Times New Roman", serif;
                font-size: 12px;
                color: #1f2937;
                background: #ffffff;
            }

            .container {
                width: 100%;
            }

            /* HEADER */
            .header {
                border-bottom: 2px solid #0f766e;
                padding-bottom: 10px;
                margin-bottom: 16px;
            }

            .header-table {
                width: 100%;
            }

            .invoice-title {
                text-align: right;
            }

            .invoice-title h2 {
                font-size: 16px;
                font-weight: 800;
                color: #111827;
            }

            .invoice-title span {
                font-size: 11px;
                color: #6b7280;
            }

            /* SECTION CARD */
            .card {
                border: 1px solid #e5e7eb;
                border-radius: 6px;
                padding: 10px 12px;
                margin-bottom: 12px;
            }

            .section-title {
                font-size: 13px;
                font-weight: 700;
                color: #0f766e;
                margin-bottom: 8px;
                border-left: 4px solid #0f766e;
                padding-left: 6px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            td {
                padding: 5px 4px;
                vertical-align: top;
            }

            .label {
                width: 35%;
                color: #6b7280;
            }

            .value {
                font-weight: 600;
                color: #111827;
            }

            /* PAYMENT TABLE */
            .payment-table td {
                padding: 6px 4px;
            }

            /* TOTAL */
            .total-box {
                margin-top: 14px;
                padding: 14px;
                border: 1px solid #99f6e4;
                background: #f0fdfa;
                border-radius: 8px;
            }

            .total-table {
                width: 100%;
            }

            .total-label {
                font-size: 13px;
                font-weight: 700;
                color: #065f46;
                text-align: right;
            }

            .total-amount {
                font-size: 22px;
                font-weight: 900;
                color: #0f766e;
                text-align: right;
            }

            .total-table {
                display: table;
                margin-left: auto;
                /* push to right */
            }

            .total-table .label,
            .total-table .value {
                display: table-cell;
                vertical-align: middle;
                white-space: nowrap;
            }

            .total-table .label {
                font-size: 14px;
                font-weight: 600;
                padding-right: 8px;
                /* gap between label & amount */
            }

            .total-table .value {
                font-size: 16px;
                font-weight: bold;
                color: #111827;
            }


            /* FOOTER */
            .footer {
                margin-top: 22px;
                text-align: center;
                font-size: 10px;
                color: #6b7280;
            }
        </style>
    </head>

    <body>
        <div class="container">

            <!-- HEADER -->
            <div class="header">
                <table class="header-table">
                    <tr>
                        <td>
                            <div>
                                <img src="{{ $logoPath }}" alt="CareOn" style="height: 50px;">
                            </div>
                        </td>
                        <td class="invoice-title">
                            <h2>SPECIAL CARE INVOICE</h2>
                            <span>Invoice Date: {{ date("F d, Y") }}</span>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- BOOKING INFO -->
            <div class="card">
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
            </div>

            <!-- PATIENT INFO -->
            <div class="card">
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
                        <td class="value">{{ $booking->patient->patient_address }}</td>
                    </tr>
                    <tr>
                        <td class="label">Special Notes</td>
                        <td class="value">{{ $booking->patient->special_notes ?? "N/A" }}</td>
                    </tr>
                </table>
            </div>

            <!-- PAYMENT -->
            <div class="card">
                <div class="section-title">Payment Summary</div>
                <table class="payment-table">
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
            </div>

            <!-- TOTAL -->
            <div class="card">
                <div class="total-table">
                    <p class="label">Total Amount</p>
                    <span class="value">৳ {{ number_format($booking->total_price) }}</span>
                </div>
            </div>


            {{-- <div class="total-box">
                <table class="">
                    <tr>
                        <td class="total-label">Total Amount</td>
                        <td class="total-amount">
                            ৳ {{ number_format($booking->total_price) }}
                        </td>
                    </tr>
                </table>
            </div> --}}

            <!-- FOOTER -->
            <div class="footer">
                This invoice is system generated and does not require a signature.<br>
                © {{ date("Y") }} CareOn. All rights reserved.
            </div>

        </div>
    </body>

</html>
