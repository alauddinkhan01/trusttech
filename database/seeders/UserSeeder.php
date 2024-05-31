<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Trust Tech Admin',
            'email' => 'admin@demo.com',
            'password' => bcrypt('admin123'),
        ]);

        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
        ]);

        $user->assignRole('user');
    }
}
