<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Course;

class AdminCanCreateACourseTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_AdminCanCreateACourse()
    {
        //Given
        // $user=User::factory(1)->create([ 'name'=>'AdminTest', 'email' => 'pepitodelacalzada@gmail.com', 'is_admin'=>true,'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi']);
        // $this->actingAs($user->is_admin);
        // $course=Course::factory
        $course=Course::factory()->create;
        $user=User::factory()->create();
        $this->actingAs($user->is_admin);
       
        //When
        $this->post(route('store', $course->id),['course_name'=>'TestCourse']);

        //Then
        $this->assertDatabaseHas('courses',['course_name'=>'TestCourse']);
        
        //$response = $this->get('/');
        //$response->assertStatus(200);
    }
}
