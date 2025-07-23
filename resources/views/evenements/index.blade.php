@extends('layouts.app')

@section('title', 'Liste des événements')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">📅 Liste des événements</h1>
        <a href="{{ route('evenements.create') }}" class="btn btn-success">+ Créer un nouvel événement</a>
    </div>
    <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('evenements.export.pdf') }}" class="btn btn-danger me-2">Exporter en PDF</a>
    <a href="{{ route('evenements.export.excel') }}" class="btn btn-success">Exporter en Excel</a>
    </div>


    @if($evenements->isEmpty())
        <div class="alert alert-info">Aucun événement disponible.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Lieu</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evenements as $evenement)
                        <tr>
                            <td>{{ $evenement->titre }}</td>
                            <td>{{ $evenement->lieu }}</td>
                            <td>{{ \Carbon\Carbon::parse($evenement->date)->format('d/m/Y') }}</td>
                            <td>{{ $evenement->heure }}</td>
                            <td>{{ $evenement->description }}</td>
                            <td>{{ $evenement->type?->nom ?? 'Non défini' }}</td>
                            <td>
                                <a href="{{ route('evenements.show1', $evenement->id) }}" class="btn btn-info btn-sm">Voir</a>
                                <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Confirmer la suppression ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
