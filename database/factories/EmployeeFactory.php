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
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'experience' => fake()->randomElement('Good', 'Avarage', 'Bad'),
            'image' => fake()->image('public/storage/fake/avater', 100, 100, null, false),
            'salary' => fake()->numberBetween(10000, 50000),
            'vacation' => fake()->boolean(),
            'city' => fake()->city(),
        ];
    }
}
