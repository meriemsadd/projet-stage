@extends('template.app')

@section('title', 'Créer un événement')

@push('styles')
<style>
    .container-form {
        max-width: 650px;
        background: white;
        padding: 2.5rem 3rem;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(0, 77, 64, 0.15);
        margin: 2rem auto 5rem;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h2 {
        color: #004d40;
        font-weight: 700;
        text-align: center;
        margin-bottom: 2rem;
        text-shadow: 1px 1px 2px rgba(160, 212, 167, 0.6);
    }

    label.form-label {
        font-weight: 600;
        color: #00695c;
    }

    input.form-control, select.form-select {
        border: 2px solid #a5d6a7;
        border-radius: 12px;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }
    input.form-control:focus, select.form-select:focus {
        border-color: #004d40;
        box-shadow: 0 0 8px #004d40aa;
        outline: none;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #842029;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(229, 57, 53, 0.25);
    }
    .alert-danger ul {
        margin-bottom: 0;
        padding-left: 1.2rem;
    }

    .d-flex.gap-2 {
        justify-content: center;
        margin-top: 1.8rem;
    }

    button.btn-success {
        background: linear-gradient(135deg, #4caf50, #087f23);
        border: none;
        padding: 0.55rem 2.2rem;
        font-weight: 700;
        font-size: 1.1rem;
        border-radius: 30px;
        box-shadow: 0 6px 15px rgba(46, 125, 50, 0.4);
        transition: background-color 0.3s ease, transform 0.2s ease;
    }
    button.btn-success:hover {
        background: linear-gradient(135deg, #087f23, #4caf50);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(30, 90, 40, 0.6);
    }

    a.btn-secondary {
        padding: 0.55rem 2.2rem;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 30px;
        background-color: #9e9e9e;
        color: white !important;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    a.btn-secondary:hover {
        background-color: #6e6e6e;
        transform: translateY(-3px);
        text-decoration: none;
    }

</style>
@endpush

@section('content')

<div class="container-form">

    <h2>Créer un nouvel événement</h2>

    {{-- Affichage des erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire --}}
    <form action="{{ route('evenements.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" placeholder="Titre de l'événement" required>
        </div>

        <div class="mb-3">
            <label for="lieu" class="form-label">Lieu</label>
            <input type="text" name="lieu" id="lieu" class="form-control" placeholder="Lieu de l'événement" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Brève description" required>
        </div>

        <div class="mb-3">
            <label for="date_de_début" class="form-label">Date de début</label>
            <input type="date" name="date_de_début" id="date_de_début" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date_de_fin" class="form-label">Date de fin</label>
            <input type="date" name="date_de_fin" id="date_de_fin" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="heure" class="form-label">Heure</label>
            <input type="time" name="heure" id="heure" class="form-control" required>
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

        <div class="d-flex gap-2 justify-content-center">
            <button type="submit" class="btn btn-success">Créer</button>
            <a href="{{ route('evenements.index') }}" class="btn btn-secondary">Annuler</a>
        </div>

    </form>
</div>

@endsection
