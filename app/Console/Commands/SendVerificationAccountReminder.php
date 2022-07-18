<?php

namespace App\Console\Commands;

use App\Events\DeleteAccount;
use App\Events\SendAccountVerificationReminder;
use App\Models\User;
use Illuminate\Console\Command;

class SendVerificationAccountReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:account-verification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder for account verification';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // probably only accept for x amount of reminder send

        User::whereNull('email_verified_at')
            ->get()
            ->each(function(User $user) {
                $this->info('Send reminder to ' . $user->name);
                SendAccountVerificationReminder::dispatch($user);
                $user->increment('total_reminders_sent');
            });

        return 0;
    }
}
