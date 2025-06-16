<?php

namespace App\Services;

use Twilio\Rest\Client;
use Twilio\Exceptions\RestException;

class TwilioVerifyService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(
            config('services.twilio.account_sid'),
            config('services.twilio.auth_token')
        );
    }

    public function sendVerificationCode(string $phone): bool
    {
        $this->client->verify
            ->v2->services(config('services.twilio.verify_sid'))
            ->verifications
            ->create($phone, 'sms');

        return true;
    }

    public function checkVerificationCode(string $phone, string $code): bool
    {
        try {
            $verification = $this->client->verify
                ->v2->services(config('services.twilio.verify_sid'))
                ->verificationChecks
                ->create([
                    'to' => $phone,
                    'code' => $code
                ]);
    
            return $verification->status === 'approved';
    
        } catch (RestException $e) {
            if ($e->getStatusCode() === 429) {
                // Log ou renvoyer une réponse personnalisée
                throw new \Exception("Trop de tentatives. Regénère un nouveau code.");
            }
    
            throw $e;
        }
    }
}
