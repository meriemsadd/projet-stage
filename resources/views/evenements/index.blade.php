<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Liste des événements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table thead th {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    {{-- Barre de navigation --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="#">Site Officiel de la Wilaya OUJDA ORIENTAL</a>
        <div class="ms-auto">
            <a href="{{ route('login') }}" class="btn btn-outline-secondary">← Se déconnecter</a>
        </div>
    </nav>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">📅 Liste des événements</h1>
            <a href="{{ route('evenements.create') }}" class="btn btn-success">+ Créer un nouvel événement</a>
        </div>

        @if($evenements->isEmpty())
            <div class="alert alert-info">Aucun événement disponible.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle text-center">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Lieu</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Description</th>
                            <th>Type</th>
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
                                    <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Confirmer la suppression ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html>
