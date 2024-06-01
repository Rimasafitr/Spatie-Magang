<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'super-admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $superAdmin -> assignRole('super-admin');

        $adminFinance = User::create([
            'name' => 'admin-finance',
            'email' => 'adminfinance@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $adminFinance -> assignRole('admin-finance');

        $adminEvent = User::create([
            'name' => 'admin-event',
            'email' => 'adminevent@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $adminEvent -> assignRole('admin-event');

        $manager = User::create([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $manager -> assignRole('manager');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user -> assignRole('user');
    }
}
