<?php

namespace App\Listeners;

use App\Events\SendAccountVerificationReminder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailVerificationReminder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendAccountVerificationReminder  $event
     * @return void
     */
    public function handle(SendAccountVerificationReminder $event)
    {
        //
    }
}
