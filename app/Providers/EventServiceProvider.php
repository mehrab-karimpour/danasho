<?php

namespace App\Providers;

use App\Events\ImageSize;
use App\Events\onlineClassCreated;
use App\Listeners\GoImageResizing;
use App\Listeners\informProfessorOnlineCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use function Illuminate\Events\queueable;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        onlineClassCreated::class => [
            informProfessorOnlineCreated::class
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(ImageSize::class, [GoImageResizing::class, 'handle']);

    }
}
