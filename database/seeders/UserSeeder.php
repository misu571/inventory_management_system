<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name' => 'Test Admin',
                'email' => 'test@admin.com',
                'password' => bcrypt('qwe123asd'),
            ],
            [
                'email' => 'manager@admin.com',
                'password' => bcrypt('qwe123asd'),
            ],
            [
                'email' => 'employee1@admin.com',
                'password' => bcrypt('qwe123asd'),
            ],
            [
                'email' => 'employee2@admin.com',
                'password' => bcrypt('qwe123asd'),
            ]
        ];
        
        foreach ($data as $row) {
            User::factory()->create($row);
        }
    }
}
