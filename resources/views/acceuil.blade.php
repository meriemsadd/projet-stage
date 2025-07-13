{{-- Une page Laravel sans layout --}}

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Wilaya</title>

    {{-- Lien vers Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Style des cartes */
        .event-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        /* Position du badge en haut à droite */
        .badge-position {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 0.9rem;
            cursor: pointer; /* Pour montrer que c'est cliquable */
        }
        /* Taille et coupe de l'image */
        .event-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        /* Pour que le corps de la carte prenne tout l'espace restant */
        .card-body {
            flex-grow: 1;
        }
    </style>
</head>
<body>
    {{-- Barre de navigation --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="#">Site Officiel de la Wilaya OUJDA ORIENTAL</a>
        <div class="ms-auto">
            <a href="{{ route('login') }}" class="btn btn-outline-primary">Se connecter</a>
        </div>
    </nav>

    {{-- Contenu principal --}}
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Liste des événements</h1>

        <div class="row gy-4"><!-- gy-4 ajoute un espace vertical entre les colonnes -->
            {{-- Boucle sur chaque événement --}}
            @foreach ($evenements as $event)
                <div class="col-md-4 d-flex">
                    <div class="card event-card">
                        {{-- Image de l'événement (à remplacer par $event->image si tu as un champ image) --}}
                        <img src="https://via.placeholder.com/400x200" class="card-img-top event-image" alt="Image">

                        {{-- Badge cliquable qui redirige vers la page détail --}}
                        <a href="{{ route('evenements.show', $event->id) }}">
                            <span class="badge bg-{{ $event->badge }} badge-position">{{ $event->status }}</span>
                        </a>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $event->titre }}</h5>
                            <p class="card-text"><strong>Lieu:</strong> {{ $event->lieu }}</p>
                            <p class="card-text"><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($event->heure)->format('H:i') }}</p>

                            {{-- Bouton Voir détails --}}
                            <a href="{{ route('evenements.show', $event->id) }}" class="btn btn-primary mt-auto">Voir détails</a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Si aucun événement --}}
            @if ($evenements->isEmpty())
                <p class="text-center">Aucun événement à afficher.</p>
            @endif
        </div>
    </div>
</body>
</html>
