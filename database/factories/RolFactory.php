<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rol>
 */
class RolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['creator', 'admin', 'reader', 'editor','validator','eraser']),
            'display_name' => $this->faker->randomElement(['Creador', 'Administrador', 'Lector', 'Editor','Validador','Borrador']),
            'description' => $this->faker->sentence(),
        ];
    }
}
