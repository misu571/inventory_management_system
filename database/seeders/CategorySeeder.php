<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Appliances'],
            ['name' => 'Cell Phones & Accessories'],
            ['name' => 'Clothing, Shoes and Jewelry'],
            ['name' => 'Computers'],
            ['name' => 'Grocery & Gourmet Food'],
            ['name' => 'Health & Beauty'],
            ['name' => 'Office Products'],
            ['name' => 'Sports'],
        ];

        foreach ($data as $row) {
            Category::factory()->create($row);
        }
    }
}
