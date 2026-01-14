<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsService
{
    public static function send($phone, $message)
    {
        // Force message to be a clean string
        $message = trim((string) $message);

        if ($message === '') {
            Log::error('SMS message is empty before sending', [
                'phone' => $phone
            ]);
            return;
        }

        $payload = [
            'api_key'  => config('services.sms.api_key'),
            'senderid' => config('services.sms.sender_id'),
            'to'       => self::formatPhone($phone),
            'msg'      => $message,
        ];

        // Log payload BEFORE sending
        // Log::info('Alpha SMS Payload', $payload);

        $response = Http::asForm()->post(
            config('services.sms.url'),
            $payload
        );

        // Log::info('Alpha SMS Response', [
        //     'status' => $response->status(),
        //     'body'   => $response->body(),
        // ]);
    }

    private static function formatPhone($phone)
    {
        $phone = preg_replace('/\D/', '', $phone);

        if (str_starts_with($phone, '0')) {
            return '880' . substr($phone, 1);
        }

        return $phone;
    }
}
