@extends('template.app')

@section('title', 'Créer un événement')

@section('content')
    {{-- Barre de navigation --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4 mb-4">
        <a class="navbar-brand" href="#">Site Officiel de la Wilaya OUJDA ORIENTAL</a>

        <div class="ms-auto d-flex gap-2">
            <a href="{{ route('acceuil') }}" class="btn btn-outline-primary">← Accueil</a>
            <a href="{{ route('login') }}" class="btn btn-outline-secondary">Se déconnecter</a>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-4 text-primary">Créer un nouvel événement</h2>

        {{-- Affichage des erreurs de validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire de création --}}
        <form action="{{ route('evenements.store') }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" name="titre" class="form-control" id="titre" required>
            </div>

            <div class="mb-3">
                <label for="lieu" class="form-label">Lieu</label>
                <input type="text" name="lieu" class="form-control" id="lieu" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="description" required>
            </div>

            <div class="mb-3">
                <label for="date_de_début" class="form-label">Date de début</label>
                <input type="date" name="date_de_début" class="form-control" id="date_de_début" required>
            </div>

            <div class="mb-3">
                <label for="date_de_fin" class="form-label">Date de fin</label>
                <input type="date" name="date_de_fin" class="form-control" id="date_de_fin" required>
            </div>

            <div class="mb-3">
                <label for="heure" class="form-label">Heure</label>
                <input type="time" name="heure" class="form-control" id="heure" required>
            </div>

            <div class="mb-3">
                <label for="type_events_id" class="form-label">Type d'événement</label>
                <select name="type_events_id" id="type_events_id" class="form-select" required>
                    <option value="">-- Choisir un type --</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Créer</button>
                <a href="{{ route('evenements.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
