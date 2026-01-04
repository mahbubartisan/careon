{{-- <!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Ambulance Service Invoice</title>

        <style>
            body {
                font-family: 'Times New Roman', Times, serif;
                font-size: 13px;
                color: #1f2937;
                background: #ffffff;
            }

            .container {
                width: 100%;
                padding: 28px;
            }

            .header {
                text-align: center;
                padding-bottom: 16px;
                margin-bottom: 28px;
                border-bottom: 2px solid #0f766e;
            }

            .logo {
                font-size: 26px;
                font-weight: 900;
                color: #0f766e;
            }

            .title {
                font-size: 16px;
                font-weight: 800;
                color: #374151;
                margin-top: 4px;
            }

            .card {
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 14px;
                margin-bottom: 18px;
            }

            .section-title {
                font-size: 14px;
                font-weight: 700;
                color: #0f766e;
                margin-bottom: 10px;
                border-left: 4px solid #0f766e;
                padding-left: 8px;
            }

            .grid {
                width: 100%;
            }

            .grid td {
                padding: 8px 6px;
            }

            .label {
                width: 35%;
                color: #6b7280;
            }

            .value {
                font-weight: 600;
            }

            .price-box {
                margin-top: 26px;
                padding: 18px;
                background: #f0fdfa;
                border: 1px solid #99f6e4;
                border-radius: 10px;
                text-align: right;
            }

            .taka-symbol {
                font-size: 30px;
                font-weight: 700;
                color: #0f766e;
            }

            .amount {
                font-size: 26px;
                font-weight: 900;
                color: #0f766e;
            }

            .footer {
                margin-top: 40px;
                text-align: center;
                font-size: 11px;
                color: #6b7280;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <!-- HEADER -->
            <div class="header">
                <div class="logo">
                    <img src="{{ $logoPath }}" alt="CareOn" style="height: 40px;">
                </div>
                <div class="title">Ambulance Service Invoice</div>
            </div>

            <!-- BOOKING INFO -->
            <div class="card">
                <div class="section-title">Booking Information</div>
                <table class="grid">
                    <tr>
                        <td class="label">Booking ID</td>
                        <td class="value">#{{ $booking->booking_id }}</td>
                    </tr>
                    <tr>
                        <td class="label">Booking Type</td>
                        <td class="value">{{ $booking->booking_type }}</td>
                    </tr>
                    <tr>
                        <td class="label">Pickup Date & Time</td>
                        <td class="value">
                            {{ \Carbon\Carbon::parse($booking->pickup_datetime)->format("F d, Y — h:i A") }}
                        </td>
                    </tr>
                </table>
            </div>

            <!-- PATIENT INFO -->
            <div class="card">
                <div class="section-title">Patient Information</div>
                <table class="grid">
                    <tr>
                        <td class="label">Patient Name</td>
                        <td class="value">{{ $booking->patient_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Age</td>
                        <td class="value">{{ $booking->patient_age }} years</td>
                    </tr>
                    <tr>
                        <td class="label">Gender</td>
                        <td class="value">{{ $booking->gender }}</td>
                    </tr>
                    <tr>
                        <td class="label">Medical Condition</td>
                        <td class="value">{{ $booking->notes ?? "N/A" }}</td>
                    </tr>
                </table>
            </div>

            <!-- CONTACT INFO -->
            <div class="card">
                <div class="section-title">Contact Information</div>
                <table class="grid">
                    <tr>
                        <td class="label">Contact Person</td>
                        <td class="value">{{ $booking->contact_person }}</td>
                    </tr>
                    <tr>
                        <td class="label">Phone</td>
                        <td class="value">{{ $booking->phone }}</td>
                    </tr>
                </table>
            </div>

            <!-- AMBULANCE DETAILS -->
            <div class="card">
                <div class="section-title">Ambulance</div>
                <table class="grid">
                    <tr>
                        <td class="label">Ambulance Type</td>
                        <td class="value">{{ $booking->ambulance_type }}</td>
                    </tr>
                    <tr>
                        <td class="label">Pickup Address</td>
                        <td class="value">{{ $booking->pickup_address }}</td>
                    </tr>
                    <tr>
                        <td class="label">Destination Address</td>
                        <td class="value">{{ $booking->destination_address }}</td>
                    </tr>
                </table>
            </div>

            <!-- FOOTER -->
            <div class="footer">
                This invoice is system generated and does not require a signature.<br>
                © {{ date("Y") }} CareOn
            </div>

        </div>

    </body>

</html> --}}
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Ambulance Service Invoice</title>

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
                padding-bottom: 10px;
            }

            .logo img {
                height: 40px;
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
                    <td class="logo">
                        <img src="{{ $logoPath }}" alt="CareOn" style="height: 50px;">
                    </td>
                    <td class="invoice-title">
                        <h2>Ambulance Service Invoice</h2>
                        <span>Date: {{ $booking->created_at->format("F d, Y") }}</span>
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
                        <td class="label">Booking Type</td>
                        <td class="value">{{ $booking->booking_type }}</td>
                    </tr>
                    <tr>
                        <td class="label">Pickup Date & Time</td>
                        <td class="value">
                            {{ \Carbon\Carbon::parse($booking->pickup_datetime)->format("F d, Y — h:i A") }}
                        </td>
                    </tr>
                </table>

                <!-- PATIENT INFO -->
                <div class="section-title">Patient Information</div>
                <table class="info-table">
                    <tr>
                        <td class="label">Patient Name</td>
                        <td class="value">{{ $booking->patient_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Age</td>
                        <td class="value">{{ $booking->patient_age }} years</td>
                    </tr>
                    <tr>
                        <td class="label">Gender</td>
                        <td class="value">{{ ucfirst($booking->gender) }}</td>
                    </tr>
                    <tr>
                        <td class="label">Medical Condition</td>
                        <td class="value">{{ $booking->notes ?? "N/A" }}</td>
                    </tr>
                </table>

                <!-- CONTACT INFO -->
                <div class="section-title">Contact Information</div>
                <table class="info-table">
                    <tr>
                        <td class="label">Contact Person</td>
                        <td class="value">{{ $booking->contact_person }}</td>
                    </tr>
                    <tr>
                        <td class="label">Phone</td>
                        <td class="value">{{ $booking->phone }}</td>
                    </tr>
                </table>

                <!-- AMBULANCE DETAILS -->
                <div class="section-title">Ambulance Details</div>
                <table class="info-table">
                    <tr>
                        <td class="label">Ambulance Type</td>
                        <td class="value">{{ $booking->ambulance_type }}</td>
                    </tr>
                    <tr>
                        <td class="label">Pickup Address</td>
                        <td class="value">{{ $booking->pickup_address }}</td>
                    </tr>
                    <tr>
                        <td class="label">Destination Address</td>
                        <td class="value">{{ $booking->destination_address }}</td>
                    </tr>
                </table>

            </div>

            <!-- FOOTER -->
            <div class="footer">
                This invoice is system generated and does not require a signature.<br>
                © {{ date("Y") }} CareOn
            </div>

        </div>

    </body>

</html>
