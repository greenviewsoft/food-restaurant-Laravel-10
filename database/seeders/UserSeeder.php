<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([


            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => Hash::make('111')
            ],

            [
                'name' => 'User',
                'email' => 'user@admin.com',
                'role' => 'user',
                'password' => Hash::make('111')
            ]

        ]);
    }
}
