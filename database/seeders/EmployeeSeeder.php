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
            ['user_id' => 3, 'designation' => 'Admin'],
            ['user_id' => 4, 'designation' => 'Manager'],
            ['user_id' => 5, 'designation' => 'Employee'],
            ['user_id' => 6, 'designation' => 'Employee'],
            ['user_id' => 7, 'designation' => 'Employee'],
            ['user_id' => 8, 'designation' => 'Employee']
        ];

        foreach ($data as $row) {
            Employee::factory()->create($row);
        }
    }
}
