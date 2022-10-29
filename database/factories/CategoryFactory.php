<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement([
                'Appliances',
                'Apps & Games',
                'Books',
                'Cell Phones & Accessories',
                'Clothing, Shoes and Jewelry',
                'Computers',
                'Grocery & Gourmet Food',
                'Garden',
                'Health',
                'Home & Kitchen',
                'Office Products',
                'Sports',
                'Home Improvement',
            ]),
        ];
    }
}
