<?php

namespace App\Console\Commands;

use App\Events\DeleteAccount;
use App\Models\User;
use Illuminate\Console\Command;

class DeleteUserAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:prune {limit=3 : Number of reminder sent}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove inactive user accounts.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $limit = $this->argument('limit');
        User::whereNull('email_verified_at')
            ->where('total_reminders_sent', '>=', $limit)
            ->get()
            ->each(fn($user) => DeleteAccount::dispatch($user));
        return 0;
    }
}
