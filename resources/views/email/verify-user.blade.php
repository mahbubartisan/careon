<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>

<body style="margin:0; padding:0; background:#f4f4f4; font-family:Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f4; padding:40px 0;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:12px; overflow:hidden;">
                    <tr>
                        <td style="padding:30px; text-align:center; background:#10b981; color:#ffffff;">
                            <h2 style="margin:0; font-size:24px; font-weight:700;">
                                Verify Your Email
                            </h2>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:30px; color:#333333; font-size:16px; line-height:1.6;">
                            <p style="margin:0 0 15px;">
                                Hello <strong>{{ $user->name }}</strong>,
                            </p>

                            <p style="margin:0 0 15px;">
                                Thank you for creating an account. Please click the button below to verify your email address.
                                This link will expire in 60 minutes.
                            </p>

                            <!-- Button -->
                            <div style="text-align:center; margin:35px 0;">
                                <a href="{{ $verificationUrl }}"
                                    style="
                                        padding:14px 30px; 
                                        background:#10b981; 
                                        color:#ffffff; 
                                        text-decoration:none; 
                                        border-radius:8px; 
                                        font-size:16px; 
                                        font-weight:600;
                                   ">
                                    Verify Email
                                </a>
                            </div>

                            <p style="margin:0 0 20px;">
                                If you did not create this account, you can safely ignore this message.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:20px; background:#f9fafb; text-align:center; font-size:12px; color:#777777;">
                            &copy; {{ date('Y') }} {{ config('app.name') }} — All rights reserved.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>