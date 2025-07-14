<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un participant</title>
</head>
<body>
    <h1>Formulaire d'inscription</h1>

    {{-- Affichage des erreurs --}}
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire -->
    <form action="{{ route('participants.store') }}" method="POST">
        @csrf

        <label>Nom :</label>
        <input type="text" name="nom" value="{{ old('nom') }}" required><br>

        <label>Prénom :</label>
        <input type="text" name="prenom" value="{{ old('prenom') }}" required><br>

        <label>Email :</label>
        <input type="email" name="email" value="{{ old('email') }}" required><br>

        <label>Profession :</label>
        <input type="text" name="profession" value="{{ old('profession') }}"><br>

        {{-- Organisme vient juste après --}}
        <label>Organisme (facultatif) :</label>
        <select name="organisme_id">
            <option value="">-- Aucun / Non spécifié --</option>
            @foreach($organismes as $organisme)
                <option value="{{ $organisme->id }}" {{ old('organisme_id') == $organisme->id ? 'selected' : '' }}>
                    {{ $organisme->nom }}
                </option>
            @endforeach
        </select><br>

        {{-- ID caché de l'événement --}}
        <input type="hidden" name="evenement_id" value="{{ $evenement_id }}">

        <button type="submit">✅ Enregistrer</button>
    </form>
</body>
</html>
