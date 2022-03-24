<?php

namespace App\Providers;

use App\Events\Assigned;
use App\Events\IncreasedUsedDate;
use App\Listeners\AssignedMailListener;
use App\Listeners\ChangeCurrentValue;
use App\Listeners\WelcomeEmailListener;
//use Illuminate\Auth\Events\Registered;
use App\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            WelcomeEmailListener::class,
        ],
        Assigned::class => [
            AssignedMailListener::class
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
