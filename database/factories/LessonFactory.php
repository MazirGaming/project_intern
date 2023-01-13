<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'course_id' => fake()->randomElement(Course::pluck('id')),
            'section_id' => fake()->randomElement(Section::pluck('id')),
            'video_type' => rand(1, 4),
            'video_url' => Str::random(10),
            'time' => Str::random(10),
            'preview' => true,
            'content' => Str::random(10),
        ];
    }
}
