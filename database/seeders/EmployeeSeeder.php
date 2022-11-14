<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'level_id' => 1,
            ],
            [
                'user_id' => 2,
                'level_id' => 2,
            ],
            [
                'user_id' => 3,
                'level_id' => 3,
            ],
            [
                'user_id' => 4,
                'level_id' => 3,
            ]
        ];

        foreach ($data as $row) {
            Employee::factory()->create($row);
        }
    }
}
