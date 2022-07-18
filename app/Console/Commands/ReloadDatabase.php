<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ReloadDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reload-db {name=mysql : Database connection} 
                {--dev : Seed development data} 
                {--demo : Seed demo data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush database and seed';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->callSilently('migrate:fresh', [
            '--database' => $this->argument('name'),
            '--seed' => true
        ]);

        if($this->option('dev')) {
            // seed dev seeder
            $this->info('Successfully seed development data into the database.');
        }

        if($this->option('demo')) {
            // seed demo seeder
            $this->info('Successfully seed demo data into the database.');
        }

        $this->info('Successfully flush and seed the database.');
        return 0;
    }
}
