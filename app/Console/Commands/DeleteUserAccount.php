<?php

namespace App\Console\Commands;

use App\Events\DeleteAccount;
use App\Jobs\PruneUsersTableJob;
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
        
        PruneUsersTableJob::dispatch($limit);

        $this->info('Pruning users table job where total reminders has sent is equal or more than ' . $limit  . ' has been dispatched.');

        return 0;
    }
}
