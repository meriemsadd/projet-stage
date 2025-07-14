<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class TypeEventsSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('type_events')->insert([
            ['nom' => 'Réunion officielle', 'created_at' => $now, 'updated_at' => $now],
            ['nom' => 'Formation', 'created_at' => $now, 'updated_at' => $now],
            ['nom' => 'Cérémonie', 'created_at' => $now, 'updated_at' => $now],
            ['nom' => 'Inspection', 'created_at' => $now, 'updated_at' => $now],
            ['nom' => 'Conférence', 'created_at' => $now, 'updated_at' => $now],
            ['nom' => 'Atelier', 'created_at' => $now, 'updated_at' => $now],
            ['nom' => 'Visite de terrain', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
