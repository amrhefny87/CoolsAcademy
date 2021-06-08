<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Course;

use App\Models\User;
use GuzzleHttp\Promise\Create;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'id' => 1,
            'name' => 'pepito de la calzada',
            'email' => 'pepitodelacalzada@gmail.com',
            'is_admin' => true,
        ]);
        User::factory(10)->create();
        Course::factory(10)->create();

            Foreach (Course::all() as $course) {
            $users = User::inRandomOrder()->take(rand(1,10))->pluck('id');
            $course->users()->attach($users);
            }

    }

    
}
