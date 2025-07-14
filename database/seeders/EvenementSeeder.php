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
                'date' => '2025-09-15',
                'heure' => '09:00:00',
                'description' => "Sensibilisation aux problématiques environnementales, nettoyage de zones naturelles, ateliers éco-responsables.",
                'type_events_id' => 6, // Atelier
        
                'image' => 'images/environnement.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Forum de l’Emploi et de l’Insertion Professionnelle",
                'lieu' => "Centre des Congrès",
                'date' => '2025-05-05',
                'heure' => '10:00:00',
                'description' => "Rencontre entre entreprises locales, chercheurs d’emploi, ateliers CV et coaching.",
                'type_events_id' => 9, // Séminaire
       
                'image' => 'images/evenements/emploi.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Salon de l’Artisanat et du Patrimoine Culturel",
                'lieu' => "Place du Marché",
                'date' => '2025-11-10',
                'heure' => '09:00:00',
                'description' => "Exposition et vente de produits artisanaux, démonstrations de savoir-faire traditionnels.",
                'type_events_id' => 7, // Visite de terrain (ou à ajuster selon tes types)
            
                'image' => 'images/evenements/artisanat.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Festival de la Musique et des Arts Régionaux",
                'lieu' => "Place des Fêtes",
                'date' => '2025-07-14',
                'heure' => '18:00:00',
                'description' => "Concerts, spectacles folkloriques, animations culturelles.",
                'type_events_id' => 3, // Cérémonie
             
                'image' => 'images/evenements/festival_musique.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Conférence sur la Gouvernance Locale et la Participation Citoyenne",
                'lieu' => "Salle de Conférences - Wilaya",
                'date' => '2025-09-25',
                'heure' => '14:00:00',
                'description' => "Débats, ateliers pour améliorer la collaboration entre citoyens et administration.",
                'type_events_id' => 5, // Conférence
         
                'image' => 'images/evenements/gouvernance.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Semaine de la Santé Publique",
                'lieu' => "Centre Hospitalier Régional",
                'date' => '2025-07-16',
                'heure' => '08:00:00',
                'description' => "Campagnes de vaccination, dépistages gratuits, sensibilisation aux maladies chroniques.",
                'type_events_id' => 6, // Atelier
         
                'image' => 'images/evenements/sante.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Compétition Sportive Intercommunale",
                'lieu' => "Stade Municipal",
                'date' => '2025-09-30',
                'heure' => '09:00:00',
                'description' => "Tournois de football, athlétisme, sports traditionnels.",
                'type_events_id' => 1, // Réunion (pas parfait, mais pas de type Sport, à ajuster)
            
                'image' => 'images/evenements/sport.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Salon de l’Innovation Technologique et du Numérique",
                'lieu' => "Centre Technologique",
                'date' => '2025-11-15',
                'heure' => '09:30:00',
                'description' => "Présentation de startups locales, formations et démonstrations.",
                'type_events_id' => 8, // Webinaire (pas exact, mais proche)
              
                'image' => 'images/evenements/innovation.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Journée Internationale de la Femme",
                'lieu' => "Maison de la Culture",
                'date' => '2025-03-08',
                'heure' => '10:00:00',
                'description' => "Conférences, ateliers empowerment, expositions sur les droits des femmes.",
                'type_events_id' => 5, // Conférence
            
                'image' => 'images/evenements/journee_femme.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Marché Agricole et Foire aux Produits Locaux",
                'lieu' => "Place du Marché Central",
                'date' => '2025-09-10',
                'heure' => '08:00:00',
                'description' => "Mise en avant des produits agricoles et fermiers de la région.",
                'type_events_id' => 7, // Visite de terrain
               
                'image' => 'images/evenements/marche_agricole.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Formation à la Sécurité Routière",
                'lieu' => "Centre de Formation",
                'date' => '2025-08-05',
                'heure' => '09:00:00',
                'description' => "Sessions de sensibilisation pour conducteurs, distribution de supports pédagogiques.",
                'type_events_id' => 2, // Formation
             
                'image' => 'images/evenements/securite_routiere.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Campagne de Solidarité et d’Action Sociale",
                'lieu' => "Place de la Solidarité",
                'date' => '2025-12-01',
                'heure' => '10:00:00',
                'description' => "Collecte de dons, distribution alimentaire, aide aux personnes vulnérables.",
                'type_events_id' => 9, // Séminaire
          
                'image' => 'images/evenements/solidarite.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Célébration des Fêtes Nationales",
                'lieu' => "Place Principale",
                'date' => '2025-07-30',
                'heure' => '09:00:00',
                'description' => "Défilés, discours officiels, animations festives.",
                'type_events_id' => 3, // Cérémonie
               
                'image' => 'images/evenements/fetes_nationales.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Journée des Jeunes Entrepreneurs",
                'lieu' => "Centre d’Affaires",
                'date' => '2025-10-20',
                'heure' => '10:00:00',
                'description' => "Conférences, ateliers sur la création d’entreprise, rencontres avec des mentors.",
                'type_events_id' => 9, // Séminaire
             
                'image' => 'images/evenements/jeunes_entrepreneurs.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'titre' => "Salon du Tourisme et du Patrimoine Local",
                'lieu' => "Palais des Congrès",
                'date' => '2025-11-25',
                'heure' => '09:00:00',
                'description' => "Promotion des sites touristiques, visites guidées, ateliers d’artisanat.",
                'type_events_id' => 7, // Visite de terrain
                
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
