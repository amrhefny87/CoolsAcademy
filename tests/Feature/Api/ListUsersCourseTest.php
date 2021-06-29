<?php

namespace Tests\Feature\Api;

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\Api\ApiController;

use function PHPUnit\Framework\assertJson;

class ListUsersCourseTest extends TestCase
{

    use RefreshDatabase;
    public function test_check_if_course_are_listed_in_json_file()
    {
        Course::factory(2)->create();
        $response = $this->get('/api/courses');
        $response->assertStatus(200)
             ->assertJsonCount(2);
    }

    public function test_check_if_course_has_multiple_users_subscribe()
    {
        $course = Course::factory()->create();
        $user = User::factory(2)->create();
        
        $user->subscribers($course, $user);

        $response = $this->get('/api/courses/{id}/subscribers');
        
        $response->assertStatus(200)
                ->assertJsonCount(2)

                ;
        
        

        }
    
}
