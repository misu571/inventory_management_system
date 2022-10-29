<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
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

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('qwe123asd'),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Employee::factory(16)->create();
        \App\Models\Customer::factory(16)->create();
        \App\Models\Supplier::factory(16)->create();
        \App\Models\Salary::factory(16)->create();
        \App\Models\Category::factory(13)->create();
        \App\Models\Product::factory(16)->create();
    }
}
