<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(app()->environment() != 'production') {
            \App\Models\User::factory(100)->create();

            \App\Models\User::query()
                ->inRandomOrder()
                ->limit(rand(10,50))
                ->get()
                ->each(fn($user) => $user->update(['email_verified_at' => now()]));
        }
    }
}
