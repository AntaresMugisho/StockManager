<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $random_number = fake()->unique()->randomNumber(2);
        $purchase_price = fake()->numberBetween(1, 3);
        $stock = fake()->numberBetween(0, 160);

        return [
            "code" => sprintf("ART-%05d", $random_number),
            "name" => ucfirst(fake()->words(2, true)),
            "description" => fake()->sentence(),
            "unit_purchase_price" => $purchase_price,
            "unit_selling_price" => fake()->numberBetween(1, $purchase_price),
            "stock" => $stock,
            "minimum_stock" => fake()->numberBetween(0, 20),
            "active" => $stock > 0,
        ];
    }
}
