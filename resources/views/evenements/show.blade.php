@extends('layouts.app')

@section('title', "Détails de l'événement - {$evenement->titre}")

@section('content')
    <div class="container py-5">
        <!-- Retour -->
        <a href="{{ route('acceuil') }}" class="btn btn-outline-secondary mb-4">← Retour à l’accueil</a>

        <!-- Titre -->
        <h1 class="text-center mb-4 display-5 fw-bold text-success">
            {{ $evenement->titre }}
        </h1>

        <!-- Image -->
        @if($evenement->image)
            <div class="text-center mb-5">
                <img src="{{ asset('storage/' . $evenement->image) }}" alt="Image de l'événement"
                     class="img-fluid rounded shadow-lg" style="max-height: 400px; object-fit: cover;">
            </div>
        @endif

        <!-- Détails -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-light p-4 rounded shadow-sm border border-success">
                    <p><strong>📍 Lieu :</strong> {{ $evenement->lieu }}</p>
                    <p><strong>📅 Début :</strong> {{ \Carbon\Carbon::parse($evenement->date_de_début)->format('d/m/Y') }}</p>
                    <p><strong>📅 Fin :</strong> {{ \Carbon\Carbon::parse($evenement->date_de_fin)->format('d/m/Y') }}</p>
                    <p><strong>⏰ Heure :</strong> {{ \Carbon\Carbon::parse($evenement->heure)->format('H:i') }}</p>
                    <p><strong>📝 Description :</strong> {{ $evenement->description }}</p>
                    <p><strong>📂 Type :</strong> {{ $evenement->type->nom ?? 'Non spécifié' }}</p>
                </div>

                <!-- Bouton inscription -->
                <div class="text-center mt-5">
                    <a href="{{ route('participants.create', $evenement->id) }}" class="btn btn-success btn-lg px-5">
                        ✅ S'inscrire à cet événement
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
