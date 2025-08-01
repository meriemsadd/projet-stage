<?php

namespace App\Http\Controllers;
use App\Models\Type;


use App\Models\Evenement; // Modèle Evenement
use Carbon\Carbon; // Librairie Carbon pour manipuler les dates

class AcceuilController extends Controller
{
   public function index()
{
    $query = Evenement::with(['type', 'user'])
                    ->orderBy('date_de_début', 'desc');

    // Appliquer le filtre par type s’il est présent dans la requête
    if (request()->has('type') && request()->type != '') {
        $query->where('type_events_id', request()->type);
    }

    // Appliquer la recherche s’il y a un mot-clé
    if (request()->has('search') && request()->search != '') {
        $search = request()->search;
        $query->where(function ($q) use ($search) {
            $q->where('titre', 'like', '%' . $search . '%')
              ->orWhere('lieu', 'like', '%' . $search . '%');
        });
    }

    // Exécuter la requête
    $evenements = $query->get();

    // Calculer le statut de chaque événement
    $evenements->transform(function ($event) {
        $datedebut = Carbon::parse($event->date_de_début . ' ' . $event->heure);
        $datefin = Carbon::parse($event->date_de_fin . ' ' . $event->heure);
        $now = Carbon::now();

        if ($now->between($datedebut, $datefin)) {
            $event->status = 'En cours';
            $event->badge = 'badge-encours';
        } elseif ($now->lt($datedebut)) {
            $event->status = 'À venir';
            $event->badge = 'badge-avenir';
        } else {
            $event->status = 'Passé';
            $event->badge = 'badge-passe';
        }

        return $event;
    });

    // Récupérer les types pour le filtre
    $types = Type::all();

    // Retourner la vue avec les données
    return view('acceuil', compact('evenements', 'types'));
}

}
