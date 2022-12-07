<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
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
            'slug' => fake()->unique()->name(),
            'link' => Str::random(10),
            'price' => '300', 
            'old_price' => '200', 
            'created_by' => '2',
            // 'category_id' => '2',
            'lessons' => '20',
            'view_count' => '2000',
            'is_feature' => '5',
            'is_online' => '5',
            'desciption' => Str::random(10),
            'content' => Str::random(10),
            'meta_title' => Str::random(10),
            'meta_desc' => Str::random(10),
            'meta_keyword' => Str::random(10),
        ];
    }
}
