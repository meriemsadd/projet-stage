<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation d'inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            color: #21613a;
        }
        .content {
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
            text-align: center;
        }
        .event-title {
            color: #000;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2 class="header">Bonjour <?php echo e($participant->prenom); ?> <?php echo e($participant->nom); ?>,</h2>

        <div class="content">
            <p>🎉 Merci pour votre inscription à l'événement <span class="event-title">« <?php echo e($participant->evenement->titre); ?> »</span>.</p>
            
            <p>Nous avons bien reçu et enregistré vos informations.</p>

            <p>📍 Lieu : <?php echo e($participant->evenement->lieu); ?></p>
            <p>📅 Date : <?php echo e(\Carbon\Carbon::parse($participant->evenement->date_debut)->format('d/m/Y')); ?> à <?php echo e(\Carbon\Carbon::parse($participant->evenement->heure_debut)->format('H:i')); ?></p>

            <p>Nous vous attendons avec plaisir. 🤝<br>
            À très bientôt !</p>
        </div>

        <div class="footer">
            — Équipe organisatrice de l'événement —
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\FATY\Desktop\projet-stage\resources\views/emails/invitation.blade.php ENDPATH**/ ?>