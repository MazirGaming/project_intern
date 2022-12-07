<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseUser>
 */
class CourseUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'course_id' => fake()->randomElement(Course::pluck('id')),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'paid' => true,
        ];
    }
}
