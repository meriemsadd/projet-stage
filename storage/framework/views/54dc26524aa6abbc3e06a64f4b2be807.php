<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invitation Événement</title>
<style>
/* Reset */
* { box-sizing: border-box; margin: 0; padding: 0; }

/* Body */
body {
    font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #e0e7ff;
    display: flex;
    justify-content: center;
    color: #2d3748;
    min-height: 100vh;
    position: relative;
    overflow-x: hidden;
}

/* Élément décoratif animé */
.decor-circle {
    position: absolute;
    border-radius: 50%;
    background: rgba(41, 98, 255, 0.1);
    animation: float 6s ease-in-out infinite alternate;
    z-index: 0;
}
.decor-circle.small { width: 80px; height: 80px; top: 50px; left: 20px; }
.decor-circle.medium { width: 120px; height: 120px; bottom: 100px; right: 40px; }
.decor-circle.large { width: 200px; height: 200px; top: 200px; right: -50px; }

@keyframes float {
    0% { transform: translateY(0px) translateX(0px); }
    50% { transform: translateY(-15px) translateX(10px); }
    100% { transform: translateY(0px) translateX(0px); }
}

/* Conteneur principal */
.invitation-card {
    background: #fff;
    width: 100%;
    max-width: 600px;
    border-radius: 0 0 25px 25px;
    box-shadow: 0 25px 50px rgba(41, 98, 255, 0.15);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    position: relative;
    z-index: 1;
}

/* Header animé */
.header {
    width: 100%;
    padding: 30px 25px 40px;
    text-align: center;
    color: #fff;
    position: relative;
    background: linear-gradient(-45deg, #2962FF, #1A237E, #2962FF, #1A237E);
    background-size: 400% 400%;
    animation: gradientBG 12s ease infinite;
}

@keyframes gradientBG {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

.header img.logo {
    width: 80px;
    height: auto;
    margin-bottom: 12px;
    filter: drop-shadow(0 3px 6px rgba(0,0,0,0.25));
    border-radius: 50%;
    background: white;
    padding: 6px;
}

.header h1 {
    font-size: 2.6rem;
    font-weight: 900;
    letter-spacing: 1px;
    text-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

.header .subtitle {
    font-size: 1.2rem;
    font-weight: 400;
    opacity: 0.9;
    margin-top: 6px;
    text-shadow: 0 1px 3px rgba(0,0,0,0.15);
}

/* Contenu */
.content {
    padding: 30px 25px 40px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.greeting {
    font-size: 1.3rem;
    color: #2962FF;
    font-weight: 600;
    margin-bottom: 15px;
}

.event-title {
    font-size: 1.9rem;
    font-weight: 700;
    color: #1A237E;
    margin: 20px 0;
    padding: 15px 20px;
    background: rgba(41, 98, 255, 0.07);
    border-radius: 12px;
    border-left: 5px solid #2962FF;
    box-shadow: 0 4px 15px rgba(41,98,255,0.1);
}

/* Détails */
.details {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin: 25px 0;
    flex-wrap: wrap;
}

.detail-item {
    background: #f0f4ff;
    border-radius: 12px;
    padding: 12px 18px;
    display: flex;
    align-items: center;
    min-width: 160px;
    box-shadow: 0 4px 12px rgba(41,98,255,0.08);
}

.detail-item .icon {
    margin-right: 10px;
    width: 38px;
    height: 38px;
    background: #2962FF;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 1.2rem;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

/* QR Code */
.qr-section {
    text-align: center;
    margin: 30px 0 20px;
    padding: 25px;
    background: linear-gradient(to bottom, #f8f9ff, #ffffff);
    border-radius: 16px;
    box-shadow: 0 6px 20px rgba(41, 98, 255, 0.15);
    transition: transform 0.3s ease;
}
.qr-section:hover { transform: translateY(-4px); }

.qr-container {
    display: inline-block;
    padding: 20px;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 6px 15px rgba(41, 98, 255, 0.15);
    margin-bottom: 15px;
}
.qr-note {
    font-size: 0.95rem;
    color: #4a5568;
    font-style: italic;
}

/* Footer */
.footer {
    width: 100%;
    padding: 18px 20px;
    background: #f0f4ff;
    color: #4a5568;
    text-align: center;
    font-size: 0.85rem;
}
.organization {
    font-weight: 600;
    color: #1A237E;
    margin-bottom: 3px;
}

/* Responsive */
@media (max-width: 620px) {
    .content { padding: 25px 15px 30px; }
    .event-title { font-size: 1.5rem; }
    .details { flex-direction: column; gap: 12px; }
}
</style>
</head>
<body>

<!-- Cercles décoratifs -->
<div class="decor-circle small"></div>
<div class="decor-circle medium"></div>
<div class="decor-circle large"></div>

<?php
use SimpleSoftwareIO\QrCode\Facades\QrCode;
?>

<div class="invitation-card">
    <!-- Header -->
    <div class="header">
        <img src="<?php echo e(asset('images/R.png')); ?>" alt="Logo Wilaya" style="width: 100px; height: auto;">
        <h1>INVITATION</h1>
        <p class="subtitle">Événement Exclusif</p>
    </div>

    <!-- Contenu -->
    <div class="content">
        <p class="greeting">Cher(e) <?php echo e($participant->prenom); ?> <?php echo e($participant->nom); ?>,</p>
        <p>Nous sommes ravis de vous compter parmi nos invités pour cet événement exceptionnel.</p>

        <h2 class="event-title"><?php echo e($participant->evenement->titre); ?></h2>

        <div class="details">
            <div class="detail-item">
                <div class="icon">📍</div>
                <div>
                    <strong>Lieu</strong><br>
                    <?php echo e($participant->evenement->lieu); ?>

                </div>
            </div>

            <div class="detail-item">
                <div class="icon">📅</div>
                <div>
                    <strong>Date & Heure</strong><br>
                    <?php echo e(\Carbon\Carbon::parse($participant->evenement->date_debut)->format('d/m/Y \\à H:i')); ?>

                </div>
            </div>
        </div>

        <div class="qr-section">
            <div class="qr-container">
                 <img src="data:image/png;base64,<?php echo e($qrBase64); ?>" alt="QR Code Invitation">
            </div>
            <p class="qr-note">Présentez ce code QR à l'entrée pour valider votre participation</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p class="organization">Wilaya de la région de l'Oriental</p>
        <p>© 2025 - Tous droits réservés</p>
    </div>
</div>

</body>
</html>
<?php /**PATH C:\Users\lenovo\Documents\projet-stage\resources\views/invitation.blade.php ENDPATH**/ ?>