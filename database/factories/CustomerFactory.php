<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'city' => fake()->city(),
            'address' => fake()->address(),
            'image' => fake()->imageUrl(100, 100),
            'shop_name' => fake()->streetName(),
            'account_name' => fake()->name(),
            'account_number' => fake()->numberBetween(3040403600, 8147483647),
            'bank_name' => 'City Bank',
            'branch_name' => 'Gulshan',
        ];
    }
}
