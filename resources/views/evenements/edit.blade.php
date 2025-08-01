@extends('layouts.app')

@section('title', 'Modifier un événement')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap');

    body {
        font-family: 'Raleway', sans-serif;
        background: #f4f9f9;
        margin: 0;
        padding: 0;
    }

    nav.navbar {
        background: linear-gradient(90deg, #00796b, #004d40);
        color: white;
        box-shadow: 0 8px 18px rgba(0,121,107,0.4);
        border-radius: 0 0 14px 14px;
    }
    nav.navbar a.navbar-brand {
        color: #a7ffeb;
        font-weight: 700;
        font-size: 1.3rem;
        letter-spacing: 1.05px;
    }
    nav.navbar .btn-outline-primary,
    nav.navbar .btn-outline-secondary {
        font-weight: 700;
        border-radius: 30px;
        border: 1.5px solid #a7ffeb;
        color: #a7ffeb;
        transition: all 0.3s ease;
        backdrop-filter: blur(6px);
        background: #ffffff22;
        box-shadow: inset 0 -3px 8px rgba(255,255,255,0.7);
    }
    nav.navbar .btn-outline-primary:hover {
        background: #a7ffeb;
        color: #004d40;
        border-color: #004d40;
        box-shadow: 0 8px 15px #a7ffebaa;
        transform: scale(1.05);
    }
    nav.navbar .btn-outline-secondary:hover {
        background: #004d40;
        color: #a7ffeb;
        border-color: #a7ffeb;
        box-shadow: 0 8px 15px #004d40aa;
        transform: scale(1.05);
    }

    .container {
        max-width: 720px;
        background: #ffffffcc;
        padding: 30px 36px;
        border-radius: 20px;
        box-shadow:
            0 16px 30px rgba(0, 121, 107, 0.3),
            0 6px 18px rgba(0, 0, 0, 0.06);
        margin-bottom: 60px;
        margin-top: 40px;
    }

    h2 {
        font-weight: 700;
        color: #00796b;
        font-size: 2rem;
        letter-spacing: 1.1px;
        margin-bottom: 30px;
        text-align: center;
        text-shadow: 1px 1px 4px rgba(0,0,0,0.15);
    }

    /* Alert erreurs */
    .alert-danger {
        border-radius: 14px;
        font-weight: 600;
        font-size: 1rem;
        box-shadow: 0 4px 18px rgba(255, 77, 77, 0.3);
    }
    .alert-danger ul {
        margin-bottom: 0;
    }

    label {
        font-weight: 600;
        color: #004d40;
        user-select: none;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"],
    textarea,
    select.form-select {
        border-radius: 14px;
        border: 1.5px solid #00796b;
        padding: 12px 16px;
        font-size: 1rem;
        color: #004d40;
        transition: border-color 0.3s ease;
        box-shadow: inset 0 1px 4px #a7ffeb44;
        width: 100%;
    }
    input[type="text"]:focus,
    input[type="date"]:focus,
    input[type="time"]:focus,
    textarea:focus,
    select.form-select:focus {
        outline: none;
        border-color: #004d40;
        box-shadow: 0 0 10px #004d40aa;
        background: #e0f2f1;
    }
    textarea {
        resize: vertical;
        min-height: 120px;
    }

    .mb-3 {
        margin-bottom: 24px;
    }

    /* Boutons */
    button.btn-success {
        background: linear-gradient(135deg, #4caf50, #087f23);
        border: none;
        padding: 0.55rem 2.4rem;
        font-weight: 700;
        font-size: 1.1rem;
        border-radius: 30px;
        box-shadow: 0 6px 15px rgba(46, 125, 50, 0.4);
        transition: background-color 0.3s ease, transform 0.25s ease, box-shadow 0.3s ease;
    }
    button.btn-success:hover {
        background: linear-gradient(135deg, #087f23, #4caf50);
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(30, 90, 40, 0.7);
    }

    a.btn-secondary {
        padding: 0.55rem 2.4rem;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 30px;
        background-color: #9e9e9e;
        color: white !important;
        transition: background-color 0.3s ease, transform 0.25s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(158, 158, 158, 0.6);
        text-decoration: none;
    }
    a.btn-secondary:hover {
        background-color: #6e6e6e;
        transform: translateY(-4px);
        text-decoration: none;
        box-shadow: 0 7px 20px rgba(110, 110, 110, 0.9);
    }

    /* Preview image */
    #preview-image {
        display: block;
        margin: 1rem auto 1.5rem auto;
        max-width: 100%;
        max-height: 250px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 77, 64, 0.3);
        object-fit: contain;
    }

    @media (max-width: 576px) {
        .container {
            padding: 2rem 1.5rem;
            margin: 1rem 1rem 3rem;
        }
        h2 {
            font-size: 1.75rem;
        }
    }
</style>

<nav class="navbar navbar-expand-lg px-4 mb-4">
    <a class="navbar-brand" href="#">Wilaya de la Région de l'Oriental</a>
    <div class="ms-auto d-flex gap-2">
        <a href="{{ route('acceuil') }}" class="btn btn-outline-primary">← Accueil</a>
        <a href="{{ route('login') }}" class="btn btn-outline-secondary">Se déconnecter</a>
    </div>
</nav>

<div class="container">
    <h2>Modifier un événement</h2>

    {{-- Erreurs validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire --}}
    <form action="{{ route('evenements.update', $Evenement->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" id="titre"
                   value="{{ old('titre', $Evenement->titre) }}" required>
        </div>

        <div class="mb-3">
            <label for="lieu" class="form-label">Lieu</label>
            <input type="text" name="lieu" class="form-control" id="lieu"
                   value="{{ old('lieu', $Evenement->lieu) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="description"
                   value="{{ old('description', $Evenement->description) }}" required>
        </div>

        <div class="mb-3">
            <label for="date_de_début" class="form-label">Date de début</label>
            <input type="date" name="date_de_début" class="form-control" id="date_de_début"
                   value="{{ old('date_de_début', $Evenement->date_de_début) }}" required>
        </div>

        <div class="mb-3">
            <label for="date_de_fin" class="form-label">Date de fin</label>
            <input type="date" name="date_de_fin" class="form-control" id="date_de_fin"
                   value="{{ old('date_de_fin', $Evenement->date_de_fin) }}" required>
        </div>

        <div class="mb-3">
            <label for="heure" class="form-label">Heure</label>
            <input type="time" name="heure" class="form-control" id="heure"
                   value="{{ old('heure', $Evenement->heure) }}" required>
        </div>

        <div class="mb-3">
            <label for="type_events_id" class="form-label">Type d'événement</label>
            <select name="type_events_id" id="type_events_id" class="form-select" required>
                <option value="">-- Choisir un type --</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_events_id', $Evenement->type_events_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Upload image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Image d l'événement (jpg, png, max 2MB)</label>
            <input 
                type="file" 
                name="image" 
                class="form-control" 
                id="image" 
                accept="image/png, image/jpeg" 
                onchange="previewImage(event)"
            >
            {{-- Affiche l’image actuelle si elle existe --}}
            @if ($Evenement->image)
                <img id="preview-image" src="{{ asset('storage/' . $Evenement->image) }}" alt="Image actuelle" style="display: block;">
            @else
                <img id="preview-image" src="#" alt="Aperçu image" style="display:none;">
            @endif
        </div>

        {{-- Événement certifié --}}
        <div class="mb-3">
            <label class="form-label d-block">Événement certifié</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="certifie" id="certifie_oui" value="1" 
                    {{ old('certifie', $Evenement->certifie) == 1 ? 'checked' : '' }} required>
                <label class="form-check-label" for="certifie_oui">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="certifie" id="certifie_non" value="0" 
                    {{ old('certifie', $Evenement->certifie) == 0 ? 'checked' : '' }} required>
                <label class="form-check-label" for="certifie_non">Non</label>
            </div>
        </div>

        <div class="d-flex gap-2 justify-content-center">
            <button type="submit" class="btn btn-success">Modifier</button>
            <a href="{{ route('evenements.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview-image');
        if (input.files && input.files[0]) {
            const file = input.files[0];
            // Vérifier taille max 2MB
            if (file.size > 2 * 1024 * 1024) {
                alert('La taille du fichier ne doit pas dépasser 2 Mo.');
                input.value = "";
                preview.style.display = 'none';
                return;
            }
            // Vérifier extension (déjà via accept mais double-check)
            const validTypes = ['image/jpeg', 'image/png'];
            if (!validTypes.includes(file.type)) {
                alert('Format invalide. Veuillez choisir un fichier JPG ou PNG.');
                input.value = "";
                preview.style.display = 'none';
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    }
</script>
@endsection
