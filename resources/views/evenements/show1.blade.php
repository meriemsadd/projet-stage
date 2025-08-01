@extends('template.app')

@section('title', 'Détails de l\'événement')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap');

    body {
        font-family: 'Raleway', sans-serif;
        background: #f4f9f9;
        margin: 0;
        padding: 0;
    }

    .btn-custom-outline-secondary {
        color: #00796b;
        border: 1.5px solid #00796b;
        font-weight: 700;
        border-radius: 30px;
        padding: 8px 20px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #ffffffdd;
        backdrop-filter: blur(8px);
        box-shadow:
            0 4px 10px rgba(0, 121, 107, 0.2),
            inset 0 -2px 8px rgba(255, 255, 255, 0.8);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-custom-outline-secondary:hover {
        background: #00796b;
        color: #e0f2f1;
        box-shadow: 0 8px 18px rgba(0, 121, 107, 0.7);
        transform: scale(1.05);
        text-decoration: none;
    }

    .btn-warning {
        background: linear-gradient(45deg, #ffd54f, #ffb300);
        border: none;
        color: #4e342e;
        font-weight: 700;
        border-radius: 30px;
        padding: 8px 20px;
        box-shadow: 0 3px 10px #ffb300aa;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-warning:hover {
        background: linear-gradient(45deg, #ffca28, #ffa000);
        color: #3e2723;
        box-shadow: 0 6px 18px #ffa000cc;
        transform: scale(1.06);
        text-decoration: none;
    }

    .card-custom {
        background: #ffffffcc;
        border-radius: 20px;
        padding: 24px 28px;
        box-shadow:
            0 12px 28px rgba(0, 121, 107, 0.25),
            0 4px 14px rgba(0, 0, 0, 0.08);
        backdrop-filter: saturate(180%) blur(15px);
        border: 1px solid #00796b33;
        margin-bottom: 40px;
    }

    .card-header-custom {
        background: linear-gradient(90deg, #00796b, #004d40);
        color: white;
        font-weight: 700;
        font-size: 1.9rem;
        border-radius: 14px 14px 0 0;
        padding: 18px 30px;
        box-shadow: 0 4px 12px rgba(0, 121, 107, 0.6);
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
    }

    .event-image {
        max-width: 100%;
        height: auto;
        border-radius: 14px;
        margin-top: 16px;
        box-shadow: 0 8px 20px rgba(0, 121, 107, 0.2);
        object-fit: cover;
    }

    .event-info p {
        font-size: 1.1rem;
        margin: 10px 0;
        color: #004d40;
        user-select: none;
    }
    .event-info p strong {
        color: #00796b;
        font-weight: 700;
    }

    /* Table participants */
    .table-responsive {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 22px rgba(0, 121, 107, 0.15);
    }
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px;
        font-size: 1rem;
        color: #004d40;
    }
    thead tr th {
        background: linear-gradient(45deg, #00796bcc, #004d4088);
        color: #e0f2f1;
        font-weight: 700;
        padding: 14px 12px;
        text-align: center;
        border-radius: 12px 12px 0 0;
        user-select: none;
    }
    tbody tr {
        background: #e0f2f1dd;
        border-radius: 14px;
        box-shadow: 0 3px 14px rgba(0, 121, 107, 0.15);
        transition: transform 0.25s ease, box-shadow 0.3s ease;
    }
    tbody tr:hover {
        background: #b2dfdbff;
        transform: translateY(-4px);
        box-shadow: 0 8px 22px rgba(0, 121, 107, 0.3);
    }
    tbody tr td {
        padding: 14px 12px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Buttons inside table */
    .btn-sm {
        font-size: 0.85rem;
        padding: 6px 14px;
        border-radius: 28px;
        font-weight: 700;
        box-shadow: 0 4px 10px rgba(0,0,0,0.07);
        transition: all 0.3s ease;
        letter-spacing: 0.03em;
        white-space: nowrap;
    }
    .btn-primary {
        background-color: #00796b;
        border: 1.5px solid #004d40;
        color: white;
        text-shadow: 0 1px 1px rgba(0,0,0,0.2);
    }
    .btn-primary:hover {
        background-color: #004d40;
        box-shadow: 0 6px 15px #004d40aa;
        color: #a7ffeb;
        transform: scale(1.05);
    }
    .btn-danger {
        background: linear-gradient(45deg, #ef5350, #d32f2f);
        border: none;
        color: white;
        text-shadow: 0 1px 1px rgba(0,0,0,0.25);
        box-shadow: 0 3px 10px #d32f2faa;
    }
    .btn-danger:hover {
        background: linear-gradient(45deg, #e53935, #b71c1c);
        box-shadow: 0 6px 20px #b71c1ccc;
        transform: scale(1.06);
    }

    /* Responsive */
    @media (max-width: 767px) {
        .btn-custom-outline-secondary, .btn-warning {
            font-size: 0.9rem;
            padding: 10px 16px;
        }
        .card-custom {
            padding: 20px 16px;
        }
        .card-header-custom {
            font-size: 1.5rem;
            padding: 14px 20px;
        }
        thead tr th, tbody tr td {
            font-size: 0.85rem;
            white-space: normal;
        }
    }
</style>

<div class="container my-4" style="max-width: 960px;">
    {{-- Boutons retour et modifier --}}
    <div class="mb-4 d-flex justify-content-between flex-wrap gap-3">
        <a href="{{ route('evenements.index') }}" class="btn-custom-outline-secondary">← Retour à la liste des événements</a>
        <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn-warning">Modifier</a>
    </div>

    {{-- Carte de l'événement --}}
    <div class="card-custom">
        <div class="card-header-custom">
            {{ $evenement->titre }}
        </div>

        {{-- Image sous le titre --}}
        @if($evenement->image)
            <img src="{{ asset('storage/' . $evenement->image) }}" alt="Image de l'événement" class="event-image">
        @endif

        <div class="event-info mt-4">
            <p><strong>Lieu :</strong> {{ $evenement->lieu }}</p>
            <p><strong>Date de début :</strong> {{ \Carbon\Carbon::parse($evenement->date_debut)->format('d/m/Y') }}</p>
            <p><strong>Date de fin :</strong> {{ \Carbon\Carbon::parse($evenement->date_fin)->format('d/m/Y') }}</p>
            <p><strong>Heure :</strong> {{ $evenement->heure }}</p>
            <p><strong>Description :</strong><br>{{ $evenement->description }}</p>
            <p><strong>Type :</strong> {{ $evenement->type?->nom ?? 'Non défini' }}</p>
        </div>
    </div>

    {{-- Liste des participants --}}
    <div class="card-custom">
        <div class="card-header-custom" style="background: linear-gradient(90deg, #004d40, #00796b);">
            Liste des participants
        </div>
        <div class="table-responsive p-3">
            @if ($participants->count())
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Profession</th>
                            <th style="width: 140px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participants as $p)
                        <tr>
                            <td>{{ $p->nom }}</td>
                            <td>{{ $p->prenom }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->profession }}</td>
                            <td>
                                <a href="{{ route('participants.edit', $p->id) }}" class="btn btn-sm btn-primary mb-1">Modifier</a>
                                <form action="{{ route('participants.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mb-1">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center text-muted fs-5">Aucun participant pour cet événement.</p>
            @endif
        </div>
    </div>
</div>
@endsection
