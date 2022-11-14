<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            LevelSeeder::class,
            EmployeeSeeder::class,
            CustomerSeeder::class,
            SupplierSeeder::class,
            AttendanceSeeder::class,
            SalarySeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            ProductSeeder::class,
            ExpenseSeeder::class,
            // ReportSeeder::class,
        ]);
    }
}
