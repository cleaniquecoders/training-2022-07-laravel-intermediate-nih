<?php

namespace App\Jobs;

use App\Events\SendAccountVerificationReminder;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendAccountVerificationReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::whereNull('email_verified_at')
            ->get()
            ->each(function(User $user) {
                logger()->info('Send reminder to ' . $user->name);
                SendAccountVerificationReminder::dispatch($user);
                $user->increment('total_reminders_sent');
            });
    }
}
