<!DOCTYPE html>
<html>
<head>
    <title>Modifier participant</title>
</head>
<body>
    <h1>Modifier Participant</h1>

    <form action="{{ route('participants.update', $participant->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $participant->nom }}"><br>

        <label>Prenom :</label>
        <input type="text" name="prenom" value="{{ $participant->prenom }}"><br>
        
        <label>Email :</label>
        <input type="email" name="email" value="{{ $participant->email }}"><br>

        <label>Événement :</label>
        <select name="evenement_id">
            @foreach($evenements as $e)
                <option value="{{ $e->id }}" {{ $participant->evenement_id == $e->id ? 'selected' : '' }}>
                    {{ $e->titre }}
                </option>
            @endforeach
        </select><br>

        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
