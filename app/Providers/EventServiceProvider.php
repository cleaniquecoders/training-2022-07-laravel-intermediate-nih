<?php

namespace App\Providers;

use App\Listeners\SendNotificationToAdministrator;
use App\Events\EmailVerified;
use App\Events\SendAccountVerificationReminder;
use App\Listeners\SendWelcomeNotification;
use App\Listeners\SendPromotionCodeForNewComer;
use App\Listeners\SubscribeToMarketingChannel;
use App\Listeners\SendEmailVerificationReminder;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
            SendNotificationToAdministrator::class,
        ],
        EmailVerified::class => [
            SendWelcomeNotification::class,
            SendPromotionCodeForNewComer::class,
            SubscribeToMarketingChannel::class,
        ],
        SendAccountVerificationReminder::class => [
            SendEmailVerificationReminder::class,
        ],
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

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
