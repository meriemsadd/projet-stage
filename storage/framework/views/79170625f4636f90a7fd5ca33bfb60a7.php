<?php $__env->startSection('title', "Détails de l'événement - {$evenement->titre}"); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap');

    body {
        font-family: 'Raleway', sans-serif;
        background: #f4f9f9;
        margin: 0;
        padding: 0;
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

    a.btn-outline-secondary {
        display: inline-block;
        font-weight: 700;
        color: #00796b;
        border: 2px solid #00796b;
        border-radius: 30px;
        padding: 8px 20px;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-bottom: 30px;
    }
    a.btn-outline-secondary:hover {
        background: #00796b;
        color: white;
        box-shadow: 0 8px 18px #00796baa;
        transform: scale(1.05);
        text-decoration: none;
    }

    h1 {
        font-weight: 700;
        color: #00796b;
        font-size: 2.4rem;
        letter-spacing: 1.1px;
        margin-bottom: 30px;
        text-align: center;
        text-shadow: 1px 1px 4px rgba(0,0,0,0.15);
    }

    .image-evenement {
        max-height: 400px;
        width: 100%;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 121, 107, 0.3);
        margin-bottom: 40px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .details {
        background: #e0f2f1;
        padding: 30px 28px;
        border-radius: 18px;
        box-shadow: inset 0 1px 5px #a5d6a7aa;
        border: 2px solid #00796b;
        color: #004d40;
        font-size: 1.05rem;
        line-height: 1.7;
        user-select: none;
    }
    .details p {
        margin-bottom: 15px;
        font-weight: 600;
    }
    .details p strong {
        color: #00796b;
        font-weight: 700;
        min-width: 120px;
        display: inline-block;
    }

    .btn-inscrire {
        background: linear-gradient(45deg, #4caf50, #087f23);
        border: none;
        color: white;
        font-weight: 700;
        padding: 12px 40px;
        font-size: 1.2rem;
        border-radius: 30px;
        box-shadow: 0 8px 20px rgba(30, 90, 40, 0.7);
        display: inline-block;
        margin: 40px auto 0 auto;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.25s ease, box-shadow 0.3s ease;
        text-decoration: none;
        text-align: center;
    }
    .btn-inscrire:hover {
        background: linear-gradient(45deg, #087f23, #4caf50);
        box-shadow: 0 12px 30px rgba(46, 125, 50, 0.8);
        transform: translateY(-5px);
        text-decoration: none;
    }

    @media (max-width: 576px) {
        .container {
            padding: 20px 16px;
            margin-top: 20px;
            margin-bottom: 40px;
        }
        h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }
        .details {
            font-size: 1rem;
        }
        .btn-inscrire {
            font-size: 1rem;
            padding: 10px 30px;
        }
    }
</style>

<div class="container">
    <!-- Bouton retour -->
    <a href="<?php echo e(route('acceuil')); ?>" class="btn-outline-secondary">← Retour à l’accueil</a>

    <!-- Titre -->
    <h1><?php echo e($evenement->titre); ?></h1>

    <!-- Image -->
    <?php if($evenement->image): ?>
        <img src="<?php echo e(asset('storage/' . $evenement->image)); ?>" alt="Image de l'événement" class="image-evenement">
    <?php endif; ?>

    <!-- Détails -->
    <div class="details">
        <p><strong>Lieu :</strong> <?php echo e($evenement->lieu); ?></p>
        <p><strong>Date de début :</strong> <?php echo e(\Carbon\Carbon::parse($evenement->date_de_début)->format('d/m/Y')); ?></p>
        <p><strong>Date de fin :</strong> <?php echo e(\Carbon\Carbon::parse($evenement->date_de_fin)->format('d/m/Y')); ?></p>
        <p><strong>Heure :</strong> <?php echo e(\Carbon\Carbon::parse($evenement->heure)->format('H:i')); ?></p>
        <p><strong>Description :</strong> <?php echo e($evenement->description); ?></p>
        <p><strong>Type :</strong> <?php echo e($evenement->type->nom ?? 'Non spécifié'); ?></p>
    </div>

    <!-- Bouton inscription -->
    <div class="text-center">
        <a href="<?php echo e(route('participants.create', $evenement->id)); ?>" class="btn-inscrire">
            S'inscrire à cet événement
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\projet-stage\resources\views/evenements/show.blade.php ENDPATH**/ ?>