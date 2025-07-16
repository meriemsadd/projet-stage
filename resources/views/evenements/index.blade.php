<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Liste des événements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body >
        {{-- Barre de navigation --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="#">Site Officiel de la Wilaya OUJDA ORIENTAL</a>
        
        {{-- Bouton retour Accueil --}}
        <div class="ms-auto">
            <a href="{{ route('login') }}" class="btn btn-outline-secondary">← Se deconnecter</a>
        </div>
         {{--<div class="ms-auto">
            <a href="{{ route('acceuil') }}" class="btn btn-outline-secondary">← Accueil</a>
        </div>--}}
    </nav>
    <h1>Liste des événements</h1>

    <a href="{{ route('evenements.create') }}">Créer un nouvel événement</a>

    @if($evenements->isEmpty())
        <p>Aucun événement disponible.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Lieu</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Description</th>
                    <th>Type d'evenement</th>
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
                <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Confirmer la suppression ?')" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>

        </tr>
    @endforeach
</tbody>

                      

        </table>
    @endif

</body>
</html>
