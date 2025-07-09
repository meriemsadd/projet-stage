<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un événement</title>
</head>
<body>
<div>
    <h2>Créer un nouvel événement</h2>

    {{-- Affichage des erreurs de validation --}}
    @if ($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire de création --}}
    <form action="{{ route('evenements.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" id="titre" required>
        </div>

        <div class="mb-3">
            <label for="lieu" class="lieu-label">Lieu</label>
            <input type="text" name="lieu" class="form-control" id="lieu" required>
        </div>
        
         <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="description" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" id="date" required>
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
                   <option value="{{$type->id}}">{{$type->nom}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('evenements.index') }}" class="btn secondary">Annuler</a>
    </form>
</div>
</body>
</html>
