<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_id' => fake()->numberBetween(1, 16),
            'amount' => fake()->numberBetween(10000, 40000),
            'given_at' => fake()->dateTimeBetween('-1 years'),
            'status' => fake()->boolean(),
        ];
    }
}
