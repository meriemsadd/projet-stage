@extends('layouts.app')

@section('title', 'Liste des événements')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap');

        body {
            font-family: 'Raleway', sans-serif;
            background: linear-gradient(135deg, #e6f4ea, #c8e6c9);
        }

        .event-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(90deg, #004d40, #004d40);
            padding: 25px 30px;
            border-radius: 12px;
            color: white;
            margin-bottom: 20px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }

        .event-header h1 {
            font-weight: 700;
            margin: 0;
            font-size: 2.2rem;
        }

        .event-header a.btn {
            background-color: white;
            color: #004d40;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        .event-header a.btn:hover {
            background-color: #e8f5e9;
            transform: scale(1.03);
        }

        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(254, 250, 250, 0.1);
            overflow: hidden;
        }

        table th {
            background: linear-gradient(90deg, #004d40, #2d8f63);
            color: white;
            font-weight: 600;
        }

        table td {
            vertical-align: middle;
        }

        .btn-sm {
            font-size: 0.85rem;
            padding: 6px 10px;
            border-radius: 6px;
        }

        .alert-info {
            background-color: #d0f0dd;
            color: #2e7d32;
            border: none;
            font-size: 1.1rem;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f8f4;
        }
    </style>

    <div class="container my-5">
        <div class="event-header">
            <h1>📅 Liste des événements</h1>
            <a href="{{ route('evenements.create') }}" class="btn shadow">
                + Créer un nouvel événement
            </a>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('evenements.export.pdf') }}" class="btn btn-danger me-2">Exporter en PDF</a>
            <a href="{{ route('evenements.export.excel') }}" class="btn btn-success">Exporter en Excel</a>
        </div>

        @if($evenements->isEmpty())
            <div class="alert alert-info text-center py-4">
                Aucun événement disponible pour le moment.
            </div>
        @else
            <div class="table-container table-responsive">
                <table class="table table-bordered table-hover text-center align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Lieu</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Heure</th>
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
                                <td>{{ \Carbon\Carbon::parse($evenement->date_debut)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($evenement->date_fin)->format('d/m/Y') }}</td>
                                <td>{{ $evenement->heure }}</td>
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
            </div>
        @endif
    </div>
@endsection
