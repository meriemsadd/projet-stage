<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un événement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
         {{-- Barre de navigation --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="#">Site Officiel de la Wilaya OUJDA ORIENTAL</a>
        
        {{-- Bouton retour Accueil --}}
        <div class="ms-auto">
            <a href="{{ route('login') }}" class="btn btn-outline-secondary">← Se deconnecter</a>
        </div>
         <div class="ms-auto">
            <a href="{{ route('acceuil') }}" class="btn btn-outline-secondary">← Accueil</a>
        </div>
    </nav>
<div>
    <h2>Modifier un nouvel événement</h2>

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
    <form action="{{ route('evenements.update', $Evenement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" id="titre" value="{{old('titre',$Evenement->titre)}}" required>
        </div>

        <div class="mb-3">
            <label for="lieu" class="lieu-label">Lieu</label>
            <input type="text" name="lieu" class="form-control" id="lieu" value="{{old('lieu',$Evenement->lieu)}}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" id="date" value="{{old('date',$Evenement->date)}}" required>
        </div>

        <div class="mb-3">
            <label for="heure" class="form-label">Heure</label>
            <input type="time" name="heure" class="form-control" id="heure" value="{{old('heure',$Evenement->heure)}}" required>
        </div>

         <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" required>{{ old('description', $Evenement->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="type_events_id" class="form-label">Type d'événement</label>
            <select name="type_events_id" id="type_events_id" class="form-select" required>
                <option value="">-- Choisir un type --</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" 
                        {{ old('type_events_id', $Evenement->type_events_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->nom }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-success">Modifier</button>
        <a href="{{ route('evenements.index') }}" class="btn secondary">Annuler</a>
    </form>
</div>
</body>
</html>
