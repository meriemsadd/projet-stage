@extends('layouts.app')

@section('title', 'Liste des événements')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap');

    body {
        font-family: 'Raleway', sans-serif;
        background: linear-gradient(135deg, #e6f4ea, #c6e6c9);
        color: #333;
    }

    .event-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(90deg, #004d40, #00695c);
        padding: 25px 30px;
        border-radius: 12px;
        color: white;
        margin-bottom: 40px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    .event-header h1 {
        font-weight: 700;
        margin: 0;
        font-size: 2.4rem;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    }

    .event-header a.btn {
        background-color: #a5d6a7;
        color: #004d40;
        font-weight: 700;
        padding: 12px 25px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 77, 64, 0.3);
        transition: all 0.3s ease-in-out;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .event-header a.btn:hover {
        background-color: #81c784;
        box-shadow: 0 6px 12px rgba(0, 77, 64, 0.4);
        transform: translateY(-3px);
        color: #00251a;
    }

    .fullwidth-table-container {
        width: 98vw;
        margin-left: calc(-49vw + 50%);
        background: white;
        border-radius: 14px;
        box-shadow: 0 6px 30px rgba(0, 77, 64, 0.15);
        overflow-x: auto;
        padding: 25px 35px;
        box-sizing: border-box;
    }

    table {
        font-size: 1.15rem;
        width: 100%;
        min-width: 1100px;
        border-collapse: separate;
        border-spacing: 0 10px; /* espace entre les lignes */
    }

    table thead tr {
        background-color: #c8e6c9; /* vert très clair uni */
        /* supprime le gradient */
        border-radius: 14px;
        box-shadow: 0 2px 8px rgba(56, 142, 60, 0.4);
        color: #1b5e20;
    }

    table th {
        color: #004d40; /* texte vert foncé */
        font-weight: 700;
        padding: 20px 25px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        user-select: none;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        border: none;
    }

    tbody tr {
        background: #f5fbf7;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    tbody tr:hover {
        background: #d7f0d6;
        box-shadow: 0 6px 20px rgba(0,77,64,0.2);
    }

    tbody td {
        padding: 18px 25px;
        text-align: center;
        color: #2e4d2d;
        font-weight: 600;
        border: 1px solid #cde6cd;
        border-radius: 10px;
        background-color: #f9fff9;
        vertical-align: middle;
    }

    .btn-sm {
        font-size: 1rem;
        padding: 10px 22px;
        border-radius: 25px;
        font-weight: 700;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .btn-info {
        background-color: #4caf50;
        color: white;
        box-shadow: 0 4px 10px rgba(76,175,80,0.4);
    }

    .btn-info:hover {
        background-color: #388e3c;
        box-shadow: 0 6px 14px rgba(56,142,60,0.6);
        color: #e8f5e9;
        transform: translateY(-3px);
    }

    .btn-warning {
        background-color: #2e7d32;
        color: white;
        box-shadow: 0 4px 10px rgba(46,125,50,0.4);
    }

    .btn-warning:hover {
        background-color: #1b4d20;
        box-shadow: 0 6px 14px rgba(27,77,32,0.6);
        color: #c8e6c9;
        transform: translateY(-3px);
    }

    .btn-danger {
        background-color: #e53935;
        color: white;
        box-shadow: 0 4px 10px rgba(229,57,53,0.4);
    }

    .btn-danger:hover {
        background-color: #ab000d;
        box-shadow: 0 6px 14px rgba(171,0,13,0.6);
        color: #f9bdbb;
        transform: translateY(-3px);
    }

    .alert-info {
        background-color: #d0f0dd;
        color: #2e7d32;
        border: none;
        font-size: 1.2rem;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 2px 10px rgba(0,77,64,0.15);
        text-align: center;
        font-weight: 600;
    }
</style>

<div class="container my-5">
    <div class="event-header">
        <h1>Liste des événements</h1>
        <a href="{{ route('evenements.create') }}" class="btn shadow">
            + Créer un nouvel événement
        </a>
    </div>
</div>

<div class="fullwidth-table-container">
    @if($evenements->isEmpty())
        <div class="alert alert-info">
            Aucun événement disponible pour le moment.
        </div>
    @else
        <table class="table table-bordered table-hover text-center align-middle mb-0">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Lieu</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evenements as $evenement)
                    <tr>
                        <td class="fw-semibold">{{ $evenement->titre }}</td>
                        <td>{{ $evenement->lieu }}</td>
                        <td>
                            du {{ \Carbon\Carbon::parse($evenement->date_debut)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($evenement->heure)->format('H:i') }}<br>
                            jusqu’au {{ \Carbon\Carbon::parse($evenement->date_fin)->format('d/m/Y') }}
                        </td>
                        <td>{{ Str::limit($evenement->description, 60) }}</td>
                        <td>{{ $evenement->type?->nom ?? 'Non défini' }}</td>
                        <td>
                            <a href="{{ route('evenements.show1', $evenement->id) }}" class="btn btn-sm btn-info mb-1">
                                Voir
                            </a>
                            <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-sm btn-warning mb-1">
                                Modifier
                            </a>
                            <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
