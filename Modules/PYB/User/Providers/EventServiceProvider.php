<?php

namespace PYB\User\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use PYB\User\Events\SendEmailToUserEvent;
use PYB\User\Listeners\SendEmailToUserListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        SendEmailToUserEvent::class => [
            SendEmailToUserListener::class
        ]

    ];
}
