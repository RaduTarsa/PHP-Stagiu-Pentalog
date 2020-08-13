<?php

namespace App\Providers;

use App\Events\BookIsBookedEvent;
use App\Events\NewBookAddedEvent;
use App\Listeners\BookIsBookedListener;
use App\Listeners\NewBookAddedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewBookAddedEvent::class => [
            NewBookAddedListener::class,
        ],
        BookIsBookedEvent::class => [
            BookIsBookedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
