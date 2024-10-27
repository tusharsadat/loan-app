<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seed an admin user
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'status' => 'active',
            'role' => 'admin',
            'password' => bcrypt('admin@example.com'),
        ]);
        //Seed an user
        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'status' => 'active',
            'role' => 'user',
            'password' => bcrypt('user@example.com'),
        ]);
    }
}
