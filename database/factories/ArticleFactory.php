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
        $random_number = fake()->random_int()->unique();
        $purchase_price = fake()->numberBetween(1, 3);
        $stock = fake()->numberBetween(0, 20);

        return [
            "code" => sprintf("ART-%05d", $random_number),
            "name" => ucfirst(fake()->words(2, true)),
            "description" => fake()->sentence(),
            "unit_purchase_price" => $purchase_price,
            "unit_selling_price" => fake()->numberBetween(1, $purchase_price),
            "minimum_stock" => $stock,
            "active" => $stock > 0,
        ];
    }
}
