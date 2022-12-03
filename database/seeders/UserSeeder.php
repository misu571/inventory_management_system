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
                'name' => 'Sami',
                'email' => 'shah.sami77@gmail.com',
                'password' => bcrypt('samiq1w2e3!'),
            ],
            [
                'name' => 'Jubair',
                'email' => 'jubir.hosn@gmail.com',
                'password' => bcrypt('jbirq!w2e34'),
            ],
            [
                'name' => 'Test Admin',
                'email' => 'test@admin.com',
                'password' => bcrypt('qwe123asd'),
            ],
            [
                'email' => 'manager@admin.com',
                'password' => bcrypt('aq1sw2de3'),
            ],
            [
                'email' => 'employee1@admin.com',
                'password' => bcrypt('q1w2e3r4'),
            ],
            [
                'email' => 'employee2@admin.com',
                'password' => bcrypt('q2w3e4r5'),
            ],
            [
                'email' => 'employee3@admin.com',
                'password' => bcrypt('q3w4e5r6'),
            ],
            [
                'email' => 'employee4@admin.com',
                'password' => bcrypt('q4e5r6t7'),
            ]
        ];
        
        foreach ($data as $row) {
            $user = User::factory()->create($row);
            if ($user->email == 'shah.sami77@gmail.com' || $user->email == 'jubir.hosn@gmail.com') {
                $user->assignRole('Super Admin');
            }
        }
    }
}
