<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Diagnostic Booking Confirmation</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f5f7;
                margin: 0;
                padding: 20px;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                border-radius: 12px;
                padding: 32px;
                border: 1px solid #e5e7eb;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            }

            .header {
                text-align: center;
                margin-bottom: 30px;
            }

            .logo {
                font-size: 26px;
                font-weight: bold;
                color: #2563eb;
            }

            .title {
                font-size: 24px;
                font-weight: bold;
                margin-top: 10px;
                color: #111827;
            }

            .subtitle {
                font-size: 15px;
                margin: 10px 0 20px;
                color: #4b5563;
                line-height: 1.6;
            }

            .section-title {
                font-size: 18px;
                margin: 25px 0 12px;
                font-weight: bold;
                color: #111827;
                border-left: 4px solid #2563eb;
                padding-left: 10px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }

            td {
                padding: 10px;
                border: 1px solid #e5e7eb;
                font-size: 14px;
                color: #374151;
                vertical-align: top;
            }

            td.label {
                background-color: #f9fafb;
                font-weight: bold;
                width: 40%;
                color: #111827;
            }

            .highlight {
                color: #16a34a;
                font-weight: bold;
            }

            .note-box {
                margin-top: 30px;
                background-color: #eff6ff;
                border-left: 5px solid #2563eb;
                padding: 20px;
                color: #1e3a8a;
                border-radius: 6px;
                font-size: 14px;
                line-height: 1.6;
            }

            .footer {
                margin-top: 40px;
                font-size: 14px;
                color: #6b7280;
                text-align: center;
                line-height: 1.6;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <div class="header">
                <div class="logo">CareOn</div>
                <div class="title">Diagnostic Booking Details</div>
            </div>

            <p class="subtitle">
                @if ($recipientType === "admin")
                    A new diagnostic service booking has been placed.
                    Below are the complete booking and patient details.
                @else
                    Hello {{ $booking->patient_name }},<br>
                    Thank you for choosing <span style="color: #16a34a; font-weight: 600">CareOn</span>.
                    Your diagnostic service booking has been successfully confirmed.
                    Please find your booking details below.
                @endif
            </p>

            <!-- BOOKING INFORMATION -->
            <div class="section-title">Booking Information</div>
            <table>
                <tr>
                    <td class="label">Booking Code</td>
                    <td>#{{ $booking->booking_id }}</td>
                </tr>
                <tr>
                    <td class="label">Diagnostic Center</td>
                    <td>{{ $booking->lab }}</td>
                </tr>
                <tr>
                    <td class="label">Preferred Date</td>
                    <td>{{ \Carbon\Carbon::parse($booking->collection_date)->format('F d Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Preferred Time Range</td>
                    <td>{{ $booking->collection_time_range }}</td>
                </tr>
                <tr>
                    <td class="label">Total Price</td>
                    <td class="highlight">৳ {{ number_format($booking->total_price) }}</td>
                </tr>
            </table>

            <!-- TEST DETAILS -->
            <div class="section-title">Selected Tests</div>
            <table>
                <tr>
                    <td class="label">Tests</td>
                    <td>
                        @foreach ($booking->tests as $name => $price)
                            • {{ $name }}
                            <span class="text-gray-600">
                                (৳{{ number_format((float) $price) }})
                            </span>
                            <br>
                        @endforeach
                    </td>
                </tr>
            </table>


            <!-- PATIENT INFORMATION -->
            <div class="section-title">Patient Information</div>
            <table>
                <tr>
                    <td class="label">Patient Name</td>
                    <td>{{ $booking->patient_name }}</td>
                </tr>
                <tr>
                    <td class="label">Age</td>
                    <td>{{ $booking->patient_age }}</td>
                </tr>
                <tr>
                    <td class="label">Gender</td>
                    <td>{{ ucfirst($booking->gender) }}</td>
                </tr>
                <tr>
                    <td class="label">Email Address</td>
                    <td>{{ $booking->email }}</td>
                </tr>
                <tr>
                    <td class="label">Phone Number</td>
                    <td>{{ $booking->phone }}</td>
                </tr>
                <tr>
                    <td class="label">Address</td>
                    <td>{{ $booking->address }}</td>
                </tr>
            </table>

            <!-- NOTES -->
            @if ($booking->notes)
                <div class="note-box"> <strong>Special Instructions:</strong><br> {{ $booking->notes }} </div>
            @endif

            <!-- FOOTER -->
            <div class="footer">
                @if ($recipientType === "admin")
                    This is an automated system notification.<br>
                    Please review the booking and proceed accordingly.
                @else
                    This is an automated confirmation message.<br>
                    If you have any questions, feel free to contact our support team.
                @endif

                <br>
                <strong>CareOn System</strong>
            </div>

        </div>

    </body>

</html>
