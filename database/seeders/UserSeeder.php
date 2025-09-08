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
            'username' => 'meryemsaddouki123', // obligatoire
            'email' => 'meryemsaddouki123@gmail.com',
            'password' => Hash::make('123456'), // toujours hasher le mot de passe
        ]);
    }
}
