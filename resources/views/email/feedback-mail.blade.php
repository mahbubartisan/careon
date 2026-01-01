<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>New Feedback Received</title>
    </head>

    <body style="margin:0; padding:20px; background:#f4f6f8; font-family:Arial, Helvetica, sans-serif;">

        <div
            style="
        max-width:600px;
        margin:0 auto;
        background:#ffffff;
        border-radius:14px;
        padding:32px;
        box-shadow:0 10px 25px rgba(0,0,0,0.06);
    ">

            <!-- Header -->
            <div style="text-align:center; margin-bottom:30px;">
                <div
                    style="
            width:56px;
            height:56px;
            margin:0 auto 14px;
            border-radius:50%;
            background:#ecfdf5; /* teal-50 */
            display:flex;
            align-items:center;
            justify-content:center;
        ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="#0f766e" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M22 17a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 21.286V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2z" />
                        <path d="M7 11h10" />
                        <path d="M7 15h6" />
                        <path d="M7 7h8" />
                    </svg>
                </div>


                <h2
                    style="
                margin:0;
                font-size:22px;
                color:#111827;
            ">
                    New Feedback Received
                </h2>

                <p
                    style="
                margin:8px 0 0;
                font-size:14px;
                color:#6b7280;
            ">
                    A new message has been submitted through the website.
                </p>
            </div>

            <!-- Content -->
            <div style="border-top:1px solid #e5e7eb; padding-top:24px;">

                <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                    <tr>
                        <td style="padding:10px 0; color:#6b7280; font-size:13px;">Name</td>
                        <td style="padding:10px 0; color:#111827; font-size:14px">
                            {{ $feedback->name }}
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:10px 0; color:#6b7280; font-size:13px;">Phone</td>
                        <td style="padding:10px 0; color:#111827; font-size:14px;">
                            {{ $feedback->phone }}
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:10px 0; color:#6b7280; font-size:13px;">Email</td>
                        <td style="padding:10px 0; color:#111827; font-size:14px;">
                            {{ $feedback->email }}
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:10px 0; color:#6b7280; font-size:13px;">Subject</td>
                        <td style="padding:10px 0; color:#111827; font-size:14px;">
                            {{ $feedback->subject }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px 0; color:#6b7280; font-size:13px;">Service</td>
                        <td style="padding:10px 0; color:#111827; font-size:14px;">
                            {{ $feedback->service }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px 0; color:#6b7280; font-size:13px;">Rating</td>
                        <td style="padding:10px 0; color:#111827; font-size:14px;">
                            {{ $feedback->rating }}
                        </td>
                    </tr>
                </table>

                <!-- Message Box -->
                <div
                    style="
                margin-top:20px;
                background:#f9fafb;
                border-left:4px solid #0f766e;
                padding:16px;
                border-radius:8px;
            ">
                    <p
                        style="
                    margin:0 0 6px;
                    font-size:13px;
                    color:#6b7280;
                ">
                        Message
                    </p>

                    <p
                        style="
                    margin:0;
                    font-size:14px;
                    color:#111827;
                    line-height:1.6;
                ">
                        {{ $feedback->message }}
                    </p>
                </div>

            </div>

            <!-- Footer -->
            <div
                style="
            margin-top:32px;
            text-align:center;
            font-size:12px;
            color:#9ca3af;
        ">
                CareOn • Automated Notification
            </div>

        </div>

    </body>

</html>
