@extends('layouts.app')

@section('title', "Détails de l'événement - {$evenement->titre}")

@section('content')
    <div class="container mt-4">
        <!-- Bouton retour à l'accueil -->
        <a href="{{ route('acceuil') }}" class="btn btn-outline-secondary mb-3">← Retour à l’accueil</a>

        <h1>{{ $evenement->titre }}</h1>

        <p><strong>Lieu :</strong> {{ $evenement->lieu }}</p>
        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($evenement->date)->format('d/m/Y') }}</p>
        <p><strong>Heure :</strong> {{ \Carbon\Carbon::parse($evenement->heure)->format('H:i') }}</p>
        <p><strong>Description :</strong> {{ $evenement->description }}</p>
        <p><strong>Type :</strong> {{ $evenement->type->nom ?? 'N/A' }}</p>

        <hr>

        <h3>Inscription au participant</h3>

        {{-- Suppose que tu as un formulaire Blade ici --}}
        <a href="{{ route('participants.create', $evenement->id) }}" class="btn btn-primary">
            S'inscrire comme participant
        </a>
    </div>
@endsection
