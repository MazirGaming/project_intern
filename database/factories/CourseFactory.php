<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Category;
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
            'category_id' => fake()->randomElement(Category::pluck('id')),
            'lessons' => rand(1, 100),
            'view_count' => rand(100, 4000),
            'is_feature' => rand(0, 10),
            'is_online' => rand(0, 10),
            'description' => Str::random(10),
            'content' => Str::random(10),
            'meta_title' => Str::random(10),
            'meta_desc' => Str::random(10),
            'meta_keyword' => Str::random(10),
        ];
    }
}
