<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'details' => fake()->paragraph(),
            'amount' => fake()->numberBetween(70, 10000),
            'expense_at' => fake()->dateTimeBetween('-1 month'),
        ];
    }
}
