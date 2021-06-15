<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Course;


class UserSubscribeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanSubscribe()
    {
        $user= User::factory()->create();
        $course=Course::factory()->create();
        $user->courses()->attach($course->id);
        dd($user->courses[0]->id);
        //$response = $this->get('/');

        //$response->assertStatus(200);
    }
}
