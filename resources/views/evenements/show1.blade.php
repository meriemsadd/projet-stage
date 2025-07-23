@extends('template.app')

@section('content')
<div class="container mt-4">

    {{-- Bouton retour --}}
    <div class="mb-3">
        <a href="{{ route('evenements.index') }}" class="btn btn-outline-secondary">← Retour à la liste des événements</a>
        <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-warning">✏️ Modifier</a>
    </div>

    {{-- Carte de l'événement --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $evenement->titre }}</h3>
        </div>
        <div class="card-body">
            <p><strong>📍 Lieu :</strong> {{ $evenement->lieu }}</p>
            <p><strong>📅 Date de début :</strong> {{ \Carbon\Carbon::parse($evenement->date_de_début)->format('d/m/Y') }}</p>
            <p><strong>📅 Date de fin :</strong> {{ \Carbon\Carbon::parse($evenement->date_de_fin)->format('d/m/Y') }}</p>
            <p><strong>🕒 Heure :</strong> {{ \Carbon\Carbon::parse($evenement->heure)->format('H:i') }}</p>
            <p><strong>📝 Description :</strong><br>{{ $evenement->description }}</p>
            <p><strong>📌 Type :</strong> {{ $evenement->type->nom ?? 'Non défini' }}</p>
        </div>
    </div>

    {{-- Table des participants --}}
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">👥 Liste des participants</h4>
        </div>
        <div class="card-body table-responsive">
            @if ($participants->count())
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Profession</th>
                            <th>Événement</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participants as $p)
                        <tr>
                            <td>{{ $p->nom }}</td>
                            <td>{{ $p->prenom }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->profession }}</td>
                            <td>{{ $p->titre }}</td>
                            <td>
                                <a href="{{ route('participants.edit', $p->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                <form action="{{ route('participants.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Confirmer la suppression ?')" class="btn btn-sm btn-danger">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">Aucun participant pour cet événement.</p>
            @endif
        </div>
    </div>
</div>
@endsection
