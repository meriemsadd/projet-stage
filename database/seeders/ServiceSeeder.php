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
            ['nom' => 'Ressources Humaines', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Urbanisme et Habitat', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Service Technique', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Service Financier', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Service Informatique', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Service des Passeport', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Affaire intérieures', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Affaires economique', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Affaires sociales', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
