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
    <?php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
    ?>

    <h1>Invitation à l'événement</h1>
    <p>Bonjour <?php echo e($participant->prenom); ?> <?php echo e($participant->nom); ?>,</p>

    <p>Merci pour votre inscription à l'événement :</p>
    <h2><?php echo e($participant->evenement->titre); ?></h2>

    <div class="details">
        <p><strong>Lieu :</strong> <?php echo e($participant->evenement->lieu); ?></p>
        <p><strong>Date :</strong> <?php echo e(\Carbon\Carbon::parse($participant->evenement->date_debut)->format('d/m/Y H:i')); ?></p>
    </div>

    <div class="qr-code">
    <?php echo QrCode::size(150)->generate(route('participants.checkin', $participant->id)); ?>

</div>


    <div class="footer">
        <p>© Organisation de l'événement - Wilaya de la région de l’Oriental</p>
    </div>
</body>
</html>
<?php /**PATH C:\Users\lenovo\projet-stage\resources\views/invitation.blade.php ENDPATH**/ ?>