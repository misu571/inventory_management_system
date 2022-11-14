<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['category_id' => 1, 'name' => 'Clothes dryer'],
            ['category_id' => 1, 'name' => 'Clothes iron'],
            ['category_id' => 1, 'name' => 'Dishwasher'],
            ['category_id' => 1, 'name' => 'Hair dryer'],
            ['category_id' => 1, 'name' => 'Heater'],
            ['category_id' => 1, 'name' => 'Light bulb'],
            ['category_id' => 1, 'name' => 'Vacuum cleaner'],
            ['category_id' => 1, 'name' => 'Washing machine'],
            ['category_id' => 2, 'name' => 'iPhone'],
            ['category_id' => 2, 'name' => 'Samsung'],
            ['category_id' => 2, 'name' => 'Nokia'],
            ['category_id' => 2, 'name' => 'Xiaomi'],
            ['category_id' => 2, 'name' => 'OPPO'],
            ['category_id' => 2, 'name' => 'OnePlus'],
            ['category_id' => 2, 'name' => 'Vivo'],
            ['category_id' => 2, 'name' => 'Realme'],
            ['category_id' => 2, 'name' => 'Smart Watch'],
            ['category_id' => 2, 'name' => 'Wireless Earbud'],
            ['category_id' => 2, 'name' => 'Bluetooth Headphone'],
            ['category_id' => 2, 'name' => 'Wired Headphone'],
            ['category_id' => 2, 'name' => 'Charger & Adapter'],
            ['category_id' => 2, 'name' => 'Memory Card'],
            ['category_id' => 2, 'name' => 'Power Bank'],
            ['category_id' => 2, 'name' => 'Case & Cover'],
            ['category_id' => 2, 'name' => 'Screen Protector'],
            ['category_id' => 3, 'name' => 'T-Shirts'],
            ['category_id' => 3, 'name' => 'Pants'],
            ['category_id' => 3, 'name' => 'Shoes'],
            ['category_id' => 3, 'name' => 'Backpacks'],
            ['category_id' => 3, 'name' => 'Luggage'],
            ['category_id' => 3, 'name' => 'Wallets'],
            ['category_id' => 4, 'name' => 'Desktops'],
            ['category_id' => 4, 'name' => 'Laptops'],
            ['category_id' => 4, 'name' => 'Tablets'],
            ['category_id' => 4, 'name' => 'Gaming Consoles'],
            ['category_id' => 4, 'name' => 'Laptop cases'],
            ['category_id' => 5, 'name' => 'Beverages'],
            ['category_id' => 5, 'name' => 'Snacks'],
            ['category_id' => 6, 'name' => 'Bath & Body'],
            ['category_id' => 6, 'name' => 'Beauty Tools'],
            ['category_id' => 7, 'name' => 'Clipboards'],
            ['category_id' => 7, 'name' => 'Staplers'],
            ['category_id' => 7, 'name' => 'Tape Dispensers'],
            ['category_id' => 7, 'name' => 'Staple Removers'],
            ['category_id' => 7, 'name' => 'Rubber Stamps'],
            ['category_id' => 8, 'name' => 'Bat'],
            ['category_id' => 8, 'name' => 'Ball'],
            ['category_id' => 8, 'name' => 'Net'],

        ];

        foreach ($data as $row) {
            SubCategory::factory()->create($row);
        }
    }
}
