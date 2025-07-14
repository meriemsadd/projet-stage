<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrganismesTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $organismes = [
            'Université Mohammed Premier',
            'Centre Régional d’Investissement (CRI) Oujda',
            'Agence Urbaine d’Oujda',
            'Direction Régionale de l’Education Nationale',
            'Hôpital Universitaire Mohammed VI',
            'Chambre de Commerce, d’Industrie et de Services (CCIS) Oujda',
            'Agence Nationale de Promotion de l’Emploi et des Compétences (ANAPEC)',
            'Office National de l’Eau Potable (ONEP) – Oujda',
            'Collectivités Locales (Mairie d’Oujda)',
            'Association des Jeunes Entrepreneurs d’Oujda',
            'Centre Social et Culturel de la Wilaya',
            'Fondation Mohammed V pour la Solidarité – Délégation Oujda',
            'Office National du Tourisme Marocain (ONMT) – Délégation Oujda',
            'Agence de Développement Social',
            'Institut Spécialisé de Technologie Appliquée – Oujda',
            'Agent administratif à la Wilaya', // Poste officiel au sein de l’administration de la Wilaya

        ];

        foreach ($organismes as $organisme) {
            DB::table('organismes')->insert([
                'nom' => $organisme,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
