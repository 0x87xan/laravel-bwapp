<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->safeEmail,
            'password' => '$2y$10$68m1n8biW541bV4cca4LtOkxTkHP/FjNIZ32Na0Ev0gXbCerR5QJW',
            'username' => fake()->name,
            'created_at' => fake()->dateTime,
            'updated_at' => fake()->dateTime,
        ];
    }
}
