<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Administration'],
            ['name' => 'Human Resource'],
            ['name' => 'Information Technology'],
            ['name' => 'Accounting'],
            ['name' => 'Marketing'],
        ];

        foreach ($data as $row) {
            Department::factory()->create($row);
        }
    }
}
