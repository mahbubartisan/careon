<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>New General Inquiry</title>
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
                        stroke="#0f766e" /* deep teal */ stroke-width="2.2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M9.09 9a3 3 0 1 1 5.82 1c0 2-3 2-3 4" />
                        <line x1="12" y1="17" x2="12" y2="17" />
                    </svg>
                </div>


                <h2
                    style="
                margin:0;
                font-size:22px;
                color:#111827;
            ">
                    New General Inquiry
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
                            {{ $inquiry->name }}
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:10px 0; color:#6b7280; font-size:13px;">Phone</td>
                        <td style="padding:10px 0; color:#111827; font-size:14px;">
                            {{ $inquiry->phone }}
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:10px 0; color:#6b7280; font-size:13px;">Email</td>
                        <td style="padding:10px 0; color:#111827; font-size:14px;">
                            {{ $inquiry->email }}
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:10px 0; color:#6b7280; font-size:13px;">Subject</td>
                        <td style="padding:10px 0; color:#111827; font-size:14px;">
                            {{ $inquiry->subject }}
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
                        {{ $inquiry->message }}
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
