<?php

namespace App\Drivers;

class WhatsappDriver
{
    public function send($to, $message)
    {
        $phone = preg_replace('/[^0-9]/', '', $to); // Remove non-digits
        $url = config('sms.drivers.whatsapp.base_url');
        $encodedMessage = urlencode($message);

        return [
            'status' => 'success',
            'message' => 'Redirecting to WhatsApp...',
            'whatsapp_url' => "{$url}?phone={$phone}&text={$encodedMessage}"
        ];
    }
}
