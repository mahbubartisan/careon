<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ambulance Request Mail</title>

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

            .highlight {
                color: #16a34a;
                font-weight: bold;
            }

            .note-box {
                margin-top: 30px;
                background: #fef2f2;
                border-left: 5px solid #dc2626;
                padding: 20px;
                color: #7f1d1d;
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

            <div class="header">
                <div class="logo">CareOn</div>
                <h1 class="title">New Ambulance Request Received</h1>
            </div>

            <p class="subtitle">
                A new ambulance booking has just been placed. Below are the complete booking and patient details.
            </p>

            <h2 class="section-title">Booking Information</h2>

            <table>
                <tr>
                    <td class="label">Booking Code</td>
                    <td>#{{ $booking->booking_id }}</td>
                </tr>

                <tr>
                    <td class="label">Booking Type</td>
                    <td>{{ ucfirst($booking->booking_type) }}</td>
                </tr>

                <tr>
                    <td class="label">Ambulance Type</td>
                    <td>{{ ucfirst($booking->ambulance_type) }}</td>
                </tr>

                <tr>
                    <td class="label">Pickup Date & Time</td>
                    <td>
                        {{ \Carbon\Carbon::parse($booking->pickup_datetime)
                            ->timezone(config('app.timezone'))
                            ->format('F d, Y • h:i A') }}
                    </td>                    
                </tr>
            </table>

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
            </table>

            <h2 class="section-title">Contact Details</h2>

            <table>
                <tr>
                    <td class="label">Contact Person</td>
                    <td>{{ $booking->contact_person }}</td>
                </tr>

                <tr>
                    <td class="label">Phone Number</td>
                    <td>{{ $booking->phone }}</td>
                </tr>
            </table>

            <h2 class="section-title">Route Details</h2>

            <table>
                <tr>
                    <td class="label">Pickup Address</td>
                    <td>{{ $booking->pickup_address }}</td>
                </tr>

                <tr>
                    <td class="label">Destination Address</td>
                    <td>{{ $booking->destination_address }}</td>
                </tr>
            </table>

            @if ($booking->notes)
                <div class="note-box">
                    <strong>Additional Notes:</strong><br>
                    {{ $booking->notes ?? "N/A" }}
                </div>
            @endif

            <div class="footer">
                This is an automated notification.<br>
                Please take an action as soon as possible.
                <br><br>
                <strong>CareOn System</strong>
            </div>

        </div>

    </body>

</html>
