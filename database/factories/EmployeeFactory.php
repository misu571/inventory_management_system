<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 4),
            'city' => fake()->city(),
            'address' => fake()->address(),
            'nid' => fake()->numberBetween(1040403600, 2147483647),
            'experience' => fake()->randomElement(['Beginner', 'Expert', 'Avarage']),
            'salary' => fake()->numberBetween(10000, 50000),
            'vacation' => fake()->boolean(),
        ];
    }
}
