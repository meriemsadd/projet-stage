<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evenement;
use Carbon\Carbon;

class EvenementSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $evenements = [
            [
                'titre' => "Journée de l’Environnement et du Développement Durable",
                'lieu' => "Parc National de la Région",
                'date_de_début' => '2025-09-15',
                'date_de_fin' => '2025-09-16',
                'heure' => '09:00:00',
                'description' => "Sensibilisation aux problématiques environnementales, nettoyage de zones naturelles, ateliers éco-responsables.",
                'type_events_id' => 6, // Atelier
                'user_id' => 1,
                'image' => 'images/environnement.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Forum de l’Emploi et de l’Insertion Professionnelle",
                'lieu' => "Centre des Congrès",
                'date_de_début'=> '2025-05-05',
                'date_de_fin'=> '2025-05-07',
                'heure' => '10:00:00',
                'description' => "Rencontre entre entreprises locales, chercheurs d'emploi, ateliers CV et coaching.",
                'type_events_id' => 9, // Séminaire
                'user_id' => 1,
                'image' => 'images/evenements/emploi.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Salon de l'Artisanat et du Patrimoine Culturel",
                'lieu' => "Place du Marché",
                'date_de_début'  => '2025-11-10',
                'date_de_fin'  => '2025-11-15',
                'heure' => '09:00:00',
                'description' => "Exposition et vente de produits artisanaux, démonstrations de savoir-faire traditionnels.",
                'type_events_id' => 7, // Visite de terrain
                'user_id' => 1,
                'image' => 'images/evenements/artisanat.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Festival de la Musique et des Arts Régionaux",
                'lieu' => "Place des Fêtes",
                'date_de_début' => '2025-07-14',
                'date_de_fin' => '2025-07-17',
                'heure' => '18:00:00',
                'description' => "Concerts, spectacles folkloriques, animations culturelles.",
                'type_events_id' => 3, // Cérémonie
                'user_id' => 1,
                'image' => 'images/evenements/festival_musique.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Conférence sur la Gouvernance Locale et la Participation Citoyenne",
                'lieu' => "Salle de Conférences - Wilaya",
                'date_de_début' => '2025-09-25',
                'date_de_fin' => '2025-09-29',
                'heure' => '14:00:00',
                'description' => "Débats, ateliers pour améliorer la collaboration entre citoyens et administration.",
                'type_events_id' => 5, // Conférence
                'user_id' => 1,
                'image' => 'images/evenements/gouvernance.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Semaine de la Santé Publique",
                'lieu' => "Centre Hospitalier Régional",
                'date_de_début' => '2025-07-16',
                'date_de_fin' => '2025-07-19',
                'heure' => '08:00:00',
                'description' => "Campagnes de vaccination, dépistages gratuits, sensibilisation aux maladies chroniques.",
                'type_events_id' => 6, // Atelier
                'user_id' => 1,
                'image' => 'images/evenements/sante.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Compétition Sportive Intercommunale",
                'lieu' => "Stade Municipal",
                'date_de_début' => '2025-09-30',
                'date_de_fin' => '2025-10-01',
                'heure' => '09:00:00',
                'description' => "Tournois de football, athlétisme, sports traditionnels.",
                'type_events_id' => 1, // Réunion
                'user_id' => 1,
                'image' => 'images/evenements/sport.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Salon de l'Innovation Technologique et du Numérique",
                'lieu' => "Centre Technologique",
                'date_de_début'  => '2025-11-15',
                'date_de_fin'  => '2025-11-18',
                'heure' => '09:30:00',
                'description' => "Présentation de startups locales, formations et démonstrations.",
                'type_events_id' => 8, // Webinaire
                'user_id' => 1,
                'image' => 'images/evenements/innovation.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Journée Internationale de la Femme",
                'lieu' => "Maison de la Culture",
                'date_de_début' => '2025-03-08',
                'date_de_fin' => '2025-03-09',
                'heure' => '10:00:00',
                'description' => "Conférences, ateliers empowerment, expositions sur les droits des femmes.",
                'type_events_id' => 5, // Conférence
                'user_id' => 4,
                'image' => 'images/evenements/journee_femme.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Marché Agricole et Foire aux Produits Locaux",
                'lieu' => "Place du Marché Central",
                'date_de_début' => '2025-09-10',
                'date_de_fin' => '2025-09-11',
                'heure' => '08:00:00',
                'description' => "Mise en avant des produits agricoles et fermiers de la région.",
                'type_events_id' => 7, // Visite de terrain
                'user_id' => 1,
                'image' => 'images/evenements/marche_agricole.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Formation à la Sécurité Routière",
                'lieu' => "Centre de Formation",
                'date_de_début' => '2025-08-05',
                'date_de_fin' => '2025-08-10',
                'heure' => '09:00:00',
                'description' => "Sessions de sensibilisation pour conducteurs, distribution de supports pédagogiques.",
                'type_events_id' => 2, // Formation
                'user_id' => 1,
                'image' => 'images/evenements/securite_routiere.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Campagne de Solidarité et d'Action Sociale",
                'lieu' => "Place de la Solidarité",
                'date_de_début' => '2025-12-01',
                'date_de_fin' => '2025-12-01',
                'heure' => '10:00:00',
                'description' => "Collecte de dons, distribution alimentaire, aide aux personnes vulnérables.",
                'type_events_id' => 9, // Séminaire
                'user_id' => 1,
                'image' => 'images/evenements/solidarite.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Célébration des Fêtes Nationales",
                'lieu' => "Place Principale",
                'date_de_début' => '2025-07-30',
                'date_de_fin' => '2025-07-30',
                'heure' => '09:00:00',
                'description' => "Défilés, discours officiels, animations festives.",
                'type_events_id' => 3, // Cérémonie
                'user_id' => 1,
                'image' => 'images/evenements/fetes_nationales.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Journée des Jeunes Entrepreneurs",
                'lieu' => "Centre d'Affaires",
                'date_de_début' => '2025-10-20',
                'date_de_fin' => '2025-10-20',
                'heure' => '10:00:00',
                'description' => "Conférences, ateliers sur la création d'entreprise, rencontres avec des mentors.",
                'type_events_id' => 9, // Séminaire
                'user_id' => 1,
                'image' => 'images/evenements/jeunes_entrepreneurs.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Salon du Tourisme et du Patrimoine Local",
                'lieu' => "Palais des Congrès",
                'date_de_début'  => '2025-11-25',
                'date_de_fin'  => '2025-11-25',
                'heure' => '09:00:00',
                'description' => "Promotion des sites touristiques, visites guidées, ateliers d'artisanat.",
                'type_events_id' => 7, // Visite de terrain
                'user_id' => 1,
                'image' => 'images/evenements/tourisme.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($evenements as $evenement) {
            Evenement::create($evenement);
        }
    }
}