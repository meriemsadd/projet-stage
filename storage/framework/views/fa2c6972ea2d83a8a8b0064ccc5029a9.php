<?php $__env->startSection('title', "Détails de l'événement - {$evenement->titre}"); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <!-- Retour -->
        <a href="<?php echo e(route('acceuil')); ?>" class="btn btn-outline-secondary mb-4">← Retour à l’accueil</a>

        <!-- Titre -->
        <h1 class="text-center mb-4 display-5 fw-bold text-success">
            <?php echo e($evenement->titre); ?>

        </h1>

        <!-- Image -->
        <?php if($evenement->image): ?>
            <div class="text-center mb-5">
                <img src="<?php echo e(asset('storage/' . $evenement->image)); ?>" alt="Image de l'événement"
                     class="img-fluid rounded shadow-lg" style="max-height: 400px; object-fit: cover;">
            </div>
        <?php endif; ?>

        <!-- Détails -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-light p-4 rounded shadow-sm border border-success">
                    <p><strong>📍 Lieu :</strong> <?php echo e($evenement->lieu); ?></p>
                    <p><strong>📅 Début :</strong> <?php echo e(\Carbon\Carbon::parse($evenement->date_de_début)->format('d/m/Y')); ?></p>
                    <p><strong>📅 Fin :</strong> <?php echo e(\Carbon\Carbon::parse($evenement->date_de_fin)->format('d/m/Y')); ?></p>
                    <p><strong>⏰ Heure :</strong> <?php echo e(\Carbon\Carbon::parse($evenement->heure)->format('H:i')); ?></p>
                    <p><strong>📝 Description :</strong> <?php echo e($evenement->description); ?></p>
                    <p><strong>📂 Type :</strong> <?php echo e($evenement->type->nom ?? 'Non spécifié'); ?></p>
                </div>

                <!-- Bouton inscription -->
                <div class="text-center mt-5">
                    <a href="<?php echo e(route('participants.create', $evenement->id)); ?>" class="btn btn-success btn-lg px-5">
                        ✅ Participer à cet événement
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\FATY\Desktop\projet-stage\resources\views/evenements/show.blade.php ENDPATH**/ ?>