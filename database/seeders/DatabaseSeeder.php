<?php

namespace Database\Seeders;

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
            $user = \App\Models\User::count();
            if (empty($user)) {
                \App\Models\User::factory(1)->create();
             }   
            \App\Models\loan_detail::factory(5)->create();
    }
}
