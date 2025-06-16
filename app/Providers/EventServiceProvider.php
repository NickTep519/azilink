<?php

namespace App\Providers;

use App\Events\AnnonceEvent;
use App\Events\CommandeEvent;
use App\Events\LoginEvent;
use App\Listeners\AnnonceListener;
use App\Listeners\CommandeListener;
use App\Listeners\LoginListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        LoginEvent::class => [
            // LoginListener::class,
        ],

        AnnonceEvent::class => [
            AnnonceListener::class,
        ],
        
        CommandeEvent::class => [
            CommandeListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
