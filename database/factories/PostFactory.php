<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $title = $this->faker->sentence(),
            'body' => $body = $this->faker->paragraph(),
            'summary' => Str::limit($body, 50),
            'slug' => Str::snake($title),
            'status' => $this->faker->randomElement(['published', 'draft', 'archived', 'pending']),
            'reading_time' => rand(1,100),
            'published_at' => random_int(0, 2)
                ? $this->faker->dateTimeBetween('-1 month', '+1 months')
                : null,
        ];
    }
}
