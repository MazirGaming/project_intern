<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'name' => fake()->unique()->name(),
            'slug' => fake()->name(),
            'parent' => '2',
            'created_by' => '3',
            'content' => Str::random(10),
            'meta_title' => Str::random(10),
            'meta_desc' => Str::random(10),
            'meta_keyword' => Str::random(10),
        ];
    }
}
