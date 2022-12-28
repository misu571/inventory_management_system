<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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
        $subGroupId = fake()->numberBetween(1, DB::table('sub_groups')->count());
        $subGroup = DB::table('sub_groups')->where('id', $subGroupId)->first(['category_id', 'sub_category_id']);
        $categoryId = $subGroup->category_id;
        $subCategoryId = $subGroup->sub_category_id;
        
        return [
            'brand_id' => fake()->numberBetween(1, DB::table('brands')->count()),
            'category_id' => $categoryId,
            'sub_category_id' => $subCategoryId,
            'sub_group_id' => $subGroupId,
            'supplier_id' => fake()->numberBetween(1, DB::table('suppliers')->count()),
            'country_id' => fake()->numberBetween(1, DB::table('countries')->count()),
            'department_id' => fake()->numberBetween(1, DB::table('departments')->count()),
            'name' => fake()->name(),
            'batch_number' => Str::random(10),
            'parts_number' => Str::random(10),
            'quantity' => fake()->numberBetween(0, 33),
            'condition' => fake()->randomElement(['new', 'used', 'damaged']),
            'location' => fake()->city(),
            'rack_number' => fake()->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G']),
            'image' => null,
            'purchase_order_number' => Str::random(10),
            'purchase_price' => $price,
            'selling_price' => fake()->randomElement([null, fake()->numberBetween($price + 250, $price + 1680)]),
            'purchase_at' => fake()->dateTimeBetween('-3 month', '-2 month'),
            'expire_at' => fake()->dateTimeBetween('-2 month', '+1 month'),
            'note' => fake()->sentence(),
        ];
    }
}
