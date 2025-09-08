<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Participant;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    public function index()
    {
        // Nombre total d'événements
        $totalEvents = Evenement::count();

        // Nombre total de participants
        $totalParticipants = Participant::count();

        // Taux de participation : participants présents / total participants
        $presentParticipants = Participant::where('presence', true)->count();
        $tauxParticipation = $totalParticipants > 0 
            ? round(($presentParticipants / $totalParticipants) * 100) 
            : 0;

        // Augmentation mensuelle : participants par mois cette année
        $participantsByMonthRaw = Participant::selectRaw(
                "CAST(strftime('%m', created_at) AS INTEGER) as month, COUNT(*) as total"
            )
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month');

        // Créer un tableau complet pour tous les mois (1 à 12)
        $participantsByMonth = collect(range(1, 12))->mapWithKeys(function ($month) use ($participantsByMonthRaw) {
            return [$month => $participantsByMonthRaw[$month] ?? 0];
        });

        // Répartition par type d'événement (join avec type_events)
        $eventsByType = Evenement::join('type_events', 'evenements.type_events_id', '=', 'type_events.id')
            ->selectRaw('type_events.nom as type, COUNT(evenements.id) as total')
            ->groupBy('type_events.nom')
            ->pluck('total', 'type');

        // Ici, on n'impose plus de types fixes, donc tous les types existants seront affichés

        return view('statistiques.index', compact(
            'totalEvents',
            'totalParticipants',
            'tauxParticipation',
            'participantsByMonth',
            'eventsByType'
        ));
    }
}
