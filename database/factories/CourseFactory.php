<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_name'=>$this->faker->word(),
            'description'=>$this->faker->word(),
            'image'=>$this->faker->imageUrl(),
            'date'=>$this->faker->date(),  
            'hour'=>$this->faker->time(),  
            'course_link'=>$this->faker->url(),
            'favorite'=>$this->faker->boolean(),
            'num_max'=>$this->faker->randomNumber(1, 50),
        ];
    }
}
