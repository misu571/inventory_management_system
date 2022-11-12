<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = fake()->numberBetween(100, 5000);
        
        return [
            'name' => fake()->name(),
            'code' => Str::random(10),
            'location' => fake()->city(),
            'route' => fake()->randomElement(['A', 'B', 'C']),
            'image' => null,
            'purchase_at' => fake()->dateTimeBetween('-3 month', '-2 month'),
            'expire_at' => fake()->dateTimeBetween('-2 month', '+1 month'),
            'purchase_price' => $price,
            'selling_price' => fake()->randomElement([null, fake()->numberBetween($price + 250, $price + 1680)]),
            'category_id' => fake()->numberBetween(1, 13),
            'sub_category_id' => fake()->numberBetween(1, 16),
            'supplier_id' => fake()->numberBetween(1, 16),
        ];
    }
}
