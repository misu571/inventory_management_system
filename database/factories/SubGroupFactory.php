<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubGroup>
 */
class SubGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $subCategoryId = fake()->numberBetween(1, DB::table('sub_categories')->count());
        $categoryId = (DB::table('sub_categories')->where('id', $subCategoryId)->first('category_id'))->category_id;
        
        return [
            'category_id' => $categoryId,
            'sub_category_id' => $subCategoryId,
            'name' => Str::random(10),
        ];
    }
}
