<?php

namespace App\Listeners;

use App\Events\DeleteAccount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteUserAccount
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
     * @param  \App\Events\DeleteAccount  $event
     * @return void
     */
    public function handle(DeleteAccount $event)
    {
        $name = $event->user->name;
        $event->user->delete();
        logger()->info('Deleted ' . $name);
    }
}
