<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking Confirmation</title>

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

            .item {
                margin: 8px 0;
                font-size: 15px;
                color: #374151;
            }

            .label {
                font-weight: bold;
                color: #111827;
            }

            .footer {
                margin-top: 40px;
                font-size: 14px;
                color: #6b7280;
                text-align: center;
                line-height: 1.6;
            }

            .thank-box {
                margin-top: 30px;
                background: #f0f7ff;
                border-left: 5px solid #2563eb;
                padding: 20px;
                color: #1e3a8a;
                border-radius: 6px;
            }

            a.btn {
                display: inline-block;
                padding: 12px 22px;
                margin-top: 20px;
                background: #2563eb;
                color: white !important;
                font-size: 16px;
                text-decoration: none;
                border-radius: 8px;
                font-weight: bold;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <div class="header">
                <div class="logo">CareOn</div>
                <h1 class="title">Booking Confirmed 🎉</h1>
            </div>

            <p class="subtitle">
                Hi {{ $booking->user->name }},<br>
                Your booking has been successfully created. We’re grateful you chose CareOn — your trust means a lot to
                us.
            </p>

            <h2 class="section-title">Booking Details</h2>

            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; margin-top: 10px;">
                <tr>
                    <td style="padding: 10px; background: #f9fafb; border: 1px solid #e5e7eb;">
                        <strong>Booking ID</strong>
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        #{{ $booking->booking_id }}
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px; background: #f9fafb; border: 1px solid #e5e7eb;">
                        <strong>Service</strong>
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        {{ $booking->service->name ?? $booking->service_name }}
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px; background: #f9fafb; border: 1px solid #e5e7eb;">
                        <strong>Package</strong>
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        {{ $booking->package->name ?? $booking->package_name }}
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px; background: #f9fafb; border: 1px solid #e5e7eb;">
                        <strong>Care Level</strong>
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        {{ $booking->care_level_name }}
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px; background: #f9fafb; border: 1px solid #e5e7eb;">
                        <strong>Hours</strong>
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        {{ $booking->hours }} hours
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px; background: #f9fafb; border: 1px solid #e5e7eb;">
                        <strong>Date</strong>
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        {{ \Carbon\Carbon::parse($booking->date)->format('F j, Y') }}
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px; background: #f9fafb; border: 1px solid #e5e7eb;">
                        <strong>Service Time</strong>
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        {{ $booking->time }}
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px; background: #f9fafb; border: 1px solid #e5e7eb;">
                        <strong>Address</strong>
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb;">
                        {{ optional($booking->patient)->address }}
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px; background: #f9fafb; border: 1px solid #e5e7eb;">
                        <strong>Total Price</strong>
                    </td>
                    <td style="padding: 10px; border: 1px solid #e5e7eb; color: #16a34a; font-weight: bold;">
                        ৳{{ number_format($booking->total_price) }}
                    </td>
                </tr>
            </table>


            <div class="thank-box"
                style="margin-top: 30px; background: #f0f7ff; border-left: 5px solid #2563eb; padding: 20px; color: #1e3a8a; border-radius: 6px;">
                💙 <strong>Thank you for trusting CareOn.</strong>

                <div style="height: 10px;"></div>

                On behalf of our entire team, we appreciate your confidence in our service.
                We're committed to giving you the best care experience.
            </div>


            <div class="footer">
                Warm regards,<br>
                <strong>The CareOn Team</strong><br>
                <br>
                Need help? Reply to this email anytime — we're here for you.
            </div>

        </div>

    </body>

</html>
