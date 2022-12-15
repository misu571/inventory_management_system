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
        $brandId = fake()->numberBetween(1, 13);
        $categoryId = fake()->numberBetween(1, 8);
        switch ($categoryId) {
            case 1:
                $subCategoryId = fake()->numberBetween(1, 8);
                break;
            
            case 2:
                $subCategoryId = fake()->numberBetween(9, 25);
                break;
            
            case 3:
                $subCategoryId = fake()->numberBetween(26, 31);
                break;
            
            case 4:
                $subCategoryId = fake()->numberBetween(32, 36);
                break;
            
            case 5:
                $subCategoryId = fake()->numberBetween(37, 38);
                break;
            
            case 6:
                $subCategoryId = fake()->numberBetween(39, 40);
                break;
            
            case 7:
                $subCategoryId = fake()->numberBetween(41, 45);
                break;
            
            default:
                $subCategoryId = fake()->numberBetween(46, 48);
                break;
        }
        
        return [
            'brand_id' => $brandId,
            'category_id' => $categoryId,
            'sub_category_id' => $subCategoryId,
            'supplier_id' => fake()->numberBetween(1, 16),
            'country_id' => fake()->numberBetween(1, 241),
            'department_id' => fake()->numberBetween(1, 5),
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
