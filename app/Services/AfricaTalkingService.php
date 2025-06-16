<?php 
// app/Services/AfricaTalkingService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AfricaTalkingService
{
    public function sendSms(string $to, string $message)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'apiKey' => config('services.africastalking.api_key'),
        ])->asForm()->post('https://api.africastalking.com/version1/messaging', [
            'username' => config('services.africastalking.username'),
            'to' => $to,
            'message' => $message,
            'from' => config('services.africastalking.sender_id'),
        ]);

        return $response->json([]);
    }
}
