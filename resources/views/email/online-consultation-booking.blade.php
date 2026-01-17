<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Doctor Consultation Booking Confirmation</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f4f5f7;
                margin: 0;
                padding: 20px;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
                background: #ffffff;
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
                padding-left: 8px;
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
            }

            td.label {
                background: #f9fafb;
                font-weight: bold;
                width: 40%;
                color: #111827;
            }

            .note-box {
                margin-top: 30px;
                background: #eff6ff;
                /* light blue background */
                border-left: 5px solid #2563eb;
                /* blue border */
                padding: 20px;
                color: #1e3a8a;
                /* dark blue text */
                border-radius: 6px;
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

            <!-- Header -->
            <div class="header">
                <div class="logo">CareOn</div>
                <h1 class="title">Online Consultation Booking Details</h1>
            </div>

            <p class="subtitle">
                @if ($recipientType === 'admin')
                    A new online doctor consultation appointment has been booked.
                    Below are the complete booking and patient details.
                @else
                    Hello {{ $booking->patient_name }},<br>
                    Thank you for choosing <span style="color: #16a34a; font-weight: 600">CareOn</span>.
                    Your online doctor consultation appointment has been successfully booked.
                    Below are the details of your booking.
                @endif
            </p>
            
            <!-- Booking Info -->
            <h2 class="section-title">Consultation Information</h2>

            <table>
                <tr>
                    <td class="label">Booking Code</td>
                    <td>#{{ $booking->booking_id }}</td>
                </tr>

                <tr>
                    <td class="label">Doctor Type</td>
                    <td>{{ $booking->doctor_type }}</td>
                </tr>

                <tr>
                    <td class="label">Appointment Date</td>
                    <td>
                        {{ \Carbon\Carbon::parse($booking->appointment_date)->format("F d, Y") }}
                    </td>
                </tr>

                <tr>
                    <td class="label">Appointment Time</td>
                    <td>
                        {{ \Carbon\Carbon::parse($booking->appointment_time)->format("h:i A") }}
                    </td>
                </tr>
            </table>

            <!-- Patient Info -->
            <h2 class="section-title">Patient Information</h2>

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
            </table>

            <!-- Problem Description -->
            <div class="note-box">
                <strong>Problem Description:</strong><br>
                {{ $booking->problem ?? "N/A" }}
            </div>

            <!-- Footer -->
            <div class="footer">
                @if ($recipientType === "admin")
                    This is an automated system notification.<br>
                    Please review the booking details and take necessary action as soon as possible.
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
