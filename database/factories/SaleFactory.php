<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => fake()->numberBetween(1,5),
            'quantity' => fake()->numberBetween(1,50),
            'total_price' => fake()->numberBetween(10000,1000000),
            'date' => fake()->date(),
        ];
    }
}
