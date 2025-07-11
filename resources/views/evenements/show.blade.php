<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'événement - {{ $evenement->titre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-light bg-light px-4">
    <a class="navbar-brand" href="{{ url('/') }}">← Retour à l'accueil</a>
</nav>

<div class="container mt-4">
    <h1>{{ $evenement->titre }}</h1>

    <p><strong>Lieu :</strong> {{ $evenement->lieu }}</p>
    <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($evenement->date)->format('d/m/Y') }}</p>
    <p><strong>Heure :</strong> {{ \Carbon\Carbon::parse($evenement->heure)->format('H:i') }}</p>
    <p><strong>Description :</strong> {{ $evenement->description }}</p>
    <p><strong>Type :</strong> {{ $evenement->type->nom ?? 'N/A' }}</p>

    <hr>

    <h3>Inscription au participant</h3>

    {{-- Suppose que tu as un formulaire Blade ici --}}
    @include('participants.create', ['evenement_id' => $evenement->id])


</div>

</body>
</html>
