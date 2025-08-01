<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Invitation à l'événement</title>
    <style>
        /* Reset léger */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f4ff, #d9e2ff);
            margin: 0;
            padding: 40px 20px;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            max-width: 480px;
            width: 100%;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 12px 25px rgba(0, 0, 70, 0.1);
            text-align: center;
            position: relative;
        }

        h1 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 12px;
            font-weight: 700;
            letter-spacing: 1.2px;
        }

        h2 {
            color: #1a73e8;
            font-weight: 700;
            margin: 15px 0 25px;
            font-size: 1.8rem;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin: 12px 0;
        }

        .details {
            margin-top: 25px;
            font-size: 1rem;
            color: #555;
            border-top: 1px solid #e1e4eb;
            padding-top: 20px;
        }

        .details p {
            margin: 8px 0;
        }

        .details strong {
            color: #333;
        }

        .qr-code {
            margin: 35px auto 0;
            width: fit-content;
            padding: 20px;
            background: #f7faff;
            border-radius: 14px;
            box-shadow: 0 6px 15px rgba(26, 115, 232, 0.15);
            transition: box-shadow 0.3s ease;
        }

        .qr-code img {
            width: 150px;
            height: 150px;
            display: block;
            margin: 0 auto;
            filter: drop-shadow(0 0 3px #1a73e8);
        }

        .qr-code:hover {
            box-shadow: 0 10px 30px rgba(26, 115, 232, 0.3);
        }

        .qr-code p {
            margin-top: 12px;
            font-size: 0.9rem;
            color: #555;
            font-style: italic;
        }

        .footer {
            margin-top: 50px;
            font-size: 0.8rem;
            color: #999;
            letter-spacing: 0.6px;
        }

        /* Responsive */
        @media (max-width: 520px) {
            .container {
                padding: 25px 20px;
            }

            h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Invitation à l'événement</h1>
        <p>Bonjour {{ $participant->prenom }} {{ $participant->nom }},</p>

        <p>Merci pour votre inscription à l'événement :</p>
        <h2>{{ $participant->evenement->titre }}</h2>

        <div class="details">
            <p><strong>Lieu :</strong> {{ $participant->evenement->lieu }}</p>
            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($participant->evenement->date_debut)->format('d/m/Y H:i') }}</p>
        </div>

        <div class="qr-code">
            @php
            use SimpleSoftwareIO\QrCode\Generator;
            use SimpleSoftwareIO\QrCode\Renderer\ImageRenderer;
            use SimpleSoftwareIO\QrCode\Renderer\Image\GDImageBackEnd;
            use SimpleSoftwareIO\QrCode\Renderer\RendererStyle\RendererStyle;

            $renderer = new ImageRenderer(
                new RendererStyle(150),
                new GDImageBackEnd()
            );

            $qr = new Generator($renderer);
            $qrImage = $qr->format('png')->generate(route('participants.checkin', $participant->id));
            @endphp

            <img src="data:image/png;base64,{{ base64_encode($qrImage) }}" alt="QR Code" />
            <p>Scannez ce QR code à l'entrée pour valider votre présence.</p>
        </div>

        <div class="footer">
            <p>© Organisation de l'événement - Wilaya de la région de l’Oriental</p>
        </div>
    </div>
</body>
</html>
