@extends('layouts.app')

@section('title', 'Liste des événements')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">📅 Liste des événements</h1>
        <a href="{{ route('evenements.create') }}" class="btn btn-success">+ Créer un nouvel événement</a>
    </div>

    @if($evenements->isEmpty())
        <div class="alert alert-info">Aucun événement disponible.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($evenements as $evenement)
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $evenement->titre }}</h5>
                            <h6 class="card-subtitle mb-2">{{ $evenement->lieu }}</h6>
                            <p class="card-text">
                                📅 {{ \Carbon\Carbon::parse($evenement->date)->format('d/m/Y') }}<br>
                                🕒 {{ $evenement->heure }}<br>
                                📋 {{ $evenement->description }}<br>
                                🔖 Type : {{ $evenement->type?->nom ?? 'Non défini' }}
                            </p>
                        </div>
                        <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                            <a href="{{ route('evenements.show1', $evenement->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
