<?php

namespace App\Console\Commands;

use App\Events\DeleteAccount;
use App\Events\SendAccountVerificationReminder;
use App\Jobs\SendAccountVerificationReminderJob;
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

        SendAccountVerificationReminderJob::dispatch();
        $this->info('Reminder job successfully created.');
        
        return 0;
    }
}
