<?php

namespace App\Http\Controllers;
use App\Models\Type;


use App\Models\Evenement; // Modèle Evenement
use Carbon\Carbon; // Librairie Carbon pour manipuler les dates

class AcceuilController extends Controller
{
    public function index()
    {
        // Récupérer tous les événements avec leur type associé
        $evenements = Evenement::with('type')->get();

        // Pour chaque événement, on calcule le statut et la classe du badge
        $evenements->transform(function ($event) {
            $datedebut = Carbon::parse($event->date_de_début. ' ' . $event->heure); // Convertir la date de l'événement en objet Carbon
            $datefin = Carbon::parse($event->date_de_fin. ' ' . $event->heure); // Convertir la date de l'événement en objet Carbon

            $now = Carbon::now(); // Date et heure actuelle

            if ($now->between($datedebut,$datefin)) {
                $event->status = 'En cours'; // Texte du statut
                $event->badge = 'success';   // Classe Bootstrap (vert)
            } elseif ($now->lt($datedebut) && $now->lt($datefin)) {
                $event->status = 'Passé';    // Texte du statut
                $event->badge = 'secondary'; // Classe Bootstrap (gris)
            } else {
                $event->status = 'À venir';  // Texte du statut
                $event->badge = 'primary';   // Classe Bootstrap (bleu)
            }

            return $event; // Retourner l'événement modifié
        });

         $types = Type::all();
        // Envoyer les événements modifiés à la vue 'acceuil.blade.php'
        return view('acceuil', compact('evenements','types'));
    }
}
