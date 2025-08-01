<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation d'inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        .email-container h2 {
            color: #21613a;
            margin-bottom: 10px;
        }
        .email-container p {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
        .event-title {
            font-weight: bold;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Bonjour {{ $participant->prenom }} {{ $participant->nom }},</h2>

        <p>🎉 Merci pour votre inscription à l'événement<br>
        <span class="event-title">« {{ $participant->evenement->titre }} »</span>.</p>

        <p>Nous avons bien reçu et enregistré vos informations.</p>

        <p>📍 <strong>Lieu :</strong> {{ $participant->evenement->lieu }}</p>
        <p>📅 <strong>Date :</strong> {{ \Carbon\Carbon::parse($participant->evenement->date_debut)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($participant->evenement->heure)->format('H:i') }}</p>

        <p>Nous vous attendons avec plaisir. 🤝<br>
        À très bientôt !</p>

        <div class="footer">
            — Équipe organisatrice de l'événement —
        </div>
    </div>
</body>
</html>
