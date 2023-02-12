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
        $name = fake()->name();
        
        return [
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'city' => fake()->city(),
            'address' => fake()->address(),
            'image' => null,
            'shop_name' => fake()->streetName(),
            'account_name' => $name,
            'account_number' => fake()->numberBetween(3040403600, 8147483647),
            'bank_name' => fake()->randomElement(['City Bank', 'Brac Bank', 'Islami Bank']),
            'branch_name' => fake()->randomElement(['Gulshan', 'Mohammadpur', 'Mirpur']),
        ];
    }
}
