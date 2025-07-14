<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('services')->insert([
            ['nom' => 'Affaires culturelles', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Travaux publics', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Ressources humaines', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Finances', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Affaires générales', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Affaires sociales', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Informatique', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Douane', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Sécurité civile', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
