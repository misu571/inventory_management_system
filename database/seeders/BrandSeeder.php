<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Nike'],
            ['name' => 'Coca-Cola'],
            ['name' => 'Pepsi'],
            ['name' => 'Adidas'],
            ['name' => 'Intel'],
            ['name' => 'Canon'],
            ['name' => 'Lego'],
            ['name' => 'Nintendo'],
            ['name' => 'Sony'],
            ['name' => 'Vivo'],
            ['name' => 'HP'],
            ['name' => 'Toyota'],
            ['name' => 'Cisco'],
        ];

        foreach ($data as $row) {
            Brand::factory()->create($row);
        }
    }
}
