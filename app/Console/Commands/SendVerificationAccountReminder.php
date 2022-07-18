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
            ->each(function($user) {
                $this->info('Send reminder to ' . $user->name);
                // event(new SendVerificationAccountReminder($user));

                // SendAccountVerificationReminder::dispatch($user);
                $total_reminder_sent = rand(1,3);
                SendAccountVerificationReminder::dispatchIf($total_reminder_sent < 3, $user);

                DeleteAccount::dispatchIf($total_reminder_sent == 3, $user);
            });

        return 0;
    }
}
