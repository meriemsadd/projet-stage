<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un participant</title>
</head>
<body>
    <h1>Formulaire d'inscription</h1>

    <!-- Formulaire -->
    <form action="{{ route('participants.store') }}" method="POST"><!-- lform mli y3mr khas ytsaft l route li fiha l controllerparticipant li fih fonction  store bach ytstoka-->
       <!--post pour stoker dans la base donne--> 
      @csrf

        <label>Nom :</label>
        <input type="text" name="nom" required><br>

        <label>Prénom :</label>
        <input type="text" name="prenom" required><br>

        <label>Email :</label>
        <input type="email" name="email" required><br>

        <label>Profession :</label>
        <input type="text" name="profession"><br>
        <!-- Champ caché pour envoyer l'ID de l'événement -->
        <input type="hidden" name="evenement_id" value="{{ $evenement_id }}">



        <button type="submit">✅ Enregistrer</button>
    </form>
</body>
</html>
