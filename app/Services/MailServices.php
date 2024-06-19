<?php

namespace App\Services\MailService;

use Illuminate\Support\Facades\Http;

class MailService
{
    public function sendEmail($to, $subject, $body)
    {
        $response = Http::post('http://localhost:32771/api/send-email', [
            'to' => $to,
            'subject' => $subject,
            'body' => $body,
        ]);

        return $response->successful();
    }
}
