<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'full_name' => 'Administrator Sistem',
            'username'  => 'admin',
            'email'     => 'admin@notaris.test',
            'password'  => Hash::make('admin123'),
            'role'      => 'admin',
        ]);
    }
}
