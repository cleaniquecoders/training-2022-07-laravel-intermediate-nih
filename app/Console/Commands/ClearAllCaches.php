<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearAllCaches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear-all-caches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all caches';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->callSilent('cache:clear');
        $this->callSilent('config:clear');
        $this->callSilent('event:clear');
        $this->callSilent('route:clear');
        $this->callSilent('view:clear');

        $this->info('Successfully clear all caches.');
        return 0;
    }
}
