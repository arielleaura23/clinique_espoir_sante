<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'address' => 'Yaoundé',
            'city' => 'Yaoundé',
            'gender' => 'female',
            'email' => 'admin@espoir.com',
            'password' => Hash::make('admin2025'),
            'role' => 'admin',
        ]);
    }
}
