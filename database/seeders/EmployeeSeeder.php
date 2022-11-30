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
            ['user_id' => 1, 'position' => 'Admin'],
            ['user_id' => 2, 'position' => 'Manager'],
            ['user_id' => 3, 'position' => 'Employee'],
            ['user_id' => 4, 'position' => 'Employee'],
            ['user_id' => 5, 'position' => 'Employee'],
            ['user_id' => 6, 'position' => 'Employee']
        ];

        foreach ($data as $row) {
            Employee::factory()->create($row);
        }
    }
}
