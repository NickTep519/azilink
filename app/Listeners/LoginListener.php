<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use App\Mail\LoginMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LoginEvent $event): void
    {
        Mail::to($event->credentials['email'])->send(new LoginMail($event->credentials)) ; 
    }
}
