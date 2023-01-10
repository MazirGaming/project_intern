<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'file_path' => Str::random(10),
            'attachable_type' => Str::random(10),
            'file_name' => Str::random(10),
            'attachable_id' => rand(0, 100),
            'extension' => Str::random(10),
            'mime_type' => Str::random(10),
            'size' => '5',
        ];
    }
}
