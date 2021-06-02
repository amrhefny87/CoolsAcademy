<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Course;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Course::factory(10)->create();
    }

    
}
