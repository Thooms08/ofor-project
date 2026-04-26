<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat Akun Admin
        User::create([
            'name' => 'Admin Ofor',
            'email' => 'admin@ofor.site',
            'password' => Hash::make('admin123'), // Password default admin
            'role' => 'admin', // Role diset sebagai admin
        ]);
    }
}