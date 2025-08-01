<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'mimi',
            'email' => 'saddouki.meriem.23@ump.ac.ma',
            'password' => Hash::make('123456'), // toujours hasher le mot de passe
        ]);
    }
}
