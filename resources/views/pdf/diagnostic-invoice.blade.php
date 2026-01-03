<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Diagnostic Invoice</title>

        {{-- <style>
            body {
                /* font-family: Arial, sans-serif; */
                font-size: 13px;
                color: #111827;
                background: #ffffff;
            }

            .container {
                width: 100%;
                padding: 24px;
            }

            .header {
                text-align: center;
                border-bottom: 2px solid #0f766e;
                padding-bottom: 12px;
                margin-bottom: 24px;
            }

            .logo {
                font-size: 22px;
                font-weight: bold;
                color: #0f766e;
            }

            .title {
                font-size: 18px;
                margin-top: 6px;
                font-weight: bold;
            }

            .grid {
                width: 100%;
                margin-bottom: 20px;
            }

            .grid td {
                padding: 8px 10px;
                vertical-align: top;
            }

            .label {
                width: 35%;
                color: #6b7280;
            }

            .value {
                font-weight: 600;
            }

            .section-title {
                margin: 20px 0 8px;
                font-size: 15px;
                font-weight: bold;
                color: #0f766e;
                border-bottom: 1px solid #e5e7eb;
                padding-bottom: 4px;
            }

            .badge {
                display: inline-block;
                background: #ecfeff;
                color: #0f766e;
                border: 1px solid #99f6e4;
                border-radius: 12px;
                padding: 4px 10px;
                font-size: 11px;
                margin: 3px 4px 0 0;
            }

            .price-box {
                margin-top: 20px;
                padding: 12px;
                border: 1px dashed #0f766e;
                text-align: right;
                font-size: 17px;
            }

            .taka-symbol {
                font-size: 26px;
                /* 🔥 bigger taka */
                vertical-align: middle;
                margin-top: 4px;
                margin-right: 4px;
            }

            .footer {
                margin-top: 40px;
                text-align: center;
                font-size: 11px;
                color: #6b7280;
            }
        </style> --}}
        <style>
            body {
                font-family: 'Times New Roman', Times, serif;
                /* font-family: dejavusans; */
                font-size: 13px;
                color: #1f2937;
                background: #ffffff;
            }

            .container {
                width: 100%;
                padding: 28px;
            }

            /* HEADER */
            .header {
                text-align: center;
                padding-bottom: 16px;
                margin-bottom: 28px;
                border-bottom: 2px solid #0f766e;
            }

            .logo {
                font-size: 26px;
                font-weight: 700;
                color: #0f766e;
                letter-spacing: 0.5px;
            }

            .title {
                font-size: 16px;
                margin-top: 4px;
                font-weight: 600;
                color: #374151;
            }

            /* CARD SECTIONS */
            .card {
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 14px;
                margin-bottom: 18px;
            }

            .grid {
                width: 100%;
            }

            .grid td {
                padding: 8px 6px;
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

            .section-title {
                font-size: 14px;
                font-weight: 700;
                color: #0f766e;
                margin-bottom: 10px;
                border-left: 4px solid #0f766e;
                padding-left: 8px;
            }

            /* BADGES */
            .badge {
                display: inline-block;
                /* background: #ecfeff; */
                color: #0f766e;
                /* border: 1px solid #99f6e4; */
                border-radius: 10px;
                padding: 16px 12px;
                font-size: 13px;
                margin: 4px 4px 0 0;
            }

            /* TOTAL BOX */
            .price-box {
                margin-top: 26px;
                padding: 18px;
                background: #f0fdfa;
                border: 1px solid #99f6e4;
                border-radius: 10px;
                text-align: right;
            }

            .price-label {
                font-size: 13px;
                color: #065f46;
                margin-bottom: 6px;
            }

            .taka-symbol {
                font-size: 30px;
                font-weight: 700;
                vertical-align: middle;
                margin-right: 4px;
                color: #0f766e;
            }

            .amount {
                font-size: 26px;
                font-weight: 900;
                color: #0f766e;
                vertical-align: middle;
            }

            /* FOOTER */
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
                <div class="logo">CareOn</div>
                <div class="title">Diagnostic Invoice</div>
            </div>

            <!-- BOOKING INFO -->
            <div class="card">
                <table class="grid">
                    <tr>
                        <td class="label">Booking ID</td>
                        <td class="value">#{{ $booking->booking_id }}</td>
                    </tr>
                    <tr>
                        <td class="label">Diagnostic Center</td>
                        <td class="value">{{ $booking->lab }}</td>
                    </tr>
                    <tr>
                        <td class="label">Booking Date</td>
                        <td class="value">{{ $booking->created_at->format("F d, Y") }}</td>
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
                        <td class="value">{{ ucfirst($booking->gender) }}</td>
                    </tr>
                    <tr>
                        <td class="label">Phone</td>
                        <td class="value">{{ $booking->phone }}</td>
                    </tr>
                    <tr>
                        <td class="label">Email</td>
                        <td class="value">{{ $booking->email }}</td>
                    </tr>
                </table>
            </div>


            <!-- TESTS -->
            {{-- <div class="card">
                <div class="section-title">Tests</div>
                @foreach ($booking->tests as $test)
                    <span class="badge">{{ $test }}</span>
                @endforeach
            </div> --}}
            <div class="card">
                <div class="section-title">Tests</div>
            
                <ul style="list-style: disc; padding-left: 20px;">
                    @foreach ($booking->tests as $name => $price)
                        <li style="display: flex; justify-content: space-between; font-size: 14px; padding: 4px 0;">
                            <span>{{ $name }}</span>
                            <span>৳ {{ number_format((float) $price) }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            
            <!-- TOTAL -->
            <div class="price-box">
                <div class="price-label">Total Amount</div>
                <span class="taka-symbol">৳</span>
                <span class="amount">{{ number_format($booking->total_price) }}</span>
            </div>


            <!-- FOOTER -->
            <div class="footer">
                This invoice is system generated and does not require a signature.<br>
                © {{ date("Y") }} CareOn
            </div>

        </div>

    </body>

</html>
