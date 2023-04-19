<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $random_code = fake()->unique()->randomNumber(2);

        return [
            "code" => sprintf("CLT-%05d", $random_code),
            "name" => fake()->name(),
            "email" => fake()->safeEmail(),
            "town" => fake()->city(),
            "country" => fake()->country(),
        ];
    }
}
