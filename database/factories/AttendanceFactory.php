<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $presentAt = fake()->dateTimeBetween('-5 month', now());
        $inTime = fake()->dateTimeInInterval($presentAt, '+' . fake()->numberBetween(25200, 28800) . ' seconds');
        $outTime = fake()->dateTimeInInterval($presentAt, '+' . fake()->numberBetween(61200, 63000) . ' seconds');
        
        return [
            'employee_id' => fake()->numberBetween(1, 6),
            'present_at' => $presentAt,
            'in_time' => $inTime,
            'out_time' => $outTime,
        ];
    }
}
