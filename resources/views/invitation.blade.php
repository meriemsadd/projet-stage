<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invitation à l'événement</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            text-align: center;
            padding: 30px;
        }
        h1 {
            margin-bottom: 10px;
        }
        .qr-code {
            margin-top: 30px;
        }
        .details {
            margin-top: 20px;
            font-size: 16px;
        }
        .footer {
            margin-top: 50px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>Invitation à l'événement</h1>
    <p>Bonjour {{ $participant->prenom }} {{ $participant->nom }},</p>

    <p>Merci pour votre inscription à l'événement :</p>
    <h2>{{ $participant->evenement->titre }}</h2>

    <div class="details">
        <p><strong>Lieu :</strong> {{ $participant->evenement->lieu }}</p>
        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($participant->evenement->date_debut)->format('d/m/Y H:i') }}</p>
    </div>

    <div class="qr-code">
        {!! QrCode::size(150)->generate(route('participants.checkin', $participant->id)) !!}
        <p>Scannez ce QR code à l'entrée pour valider votre présence.</p>
    </div>

    <div class="footer">
        <p>© Organisation de l'événement - Wilaya de la région de l’Oriental</p>
    </div>
</body>
</html>
