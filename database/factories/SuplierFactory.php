<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SuplierFactory extends Factory
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
            "code" => sprintf("FRN-%05d", $random_code),
            "name" => ucfirst(fake()->words(2, true)),
            "email" => fake()->sentence(),
            "town" => fake()->city(),
            "country" => fake()->country(),
        ];
    }
}
