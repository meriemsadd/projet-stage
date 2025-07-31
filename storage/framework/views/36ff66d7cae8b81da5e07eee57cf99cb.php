

<?php $__env->startSection('title', 'Réinitialiser le mot de passe'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Réinitialisation du mot de passe</h2>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <form action="<?php echo e(route('loginReset')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="login" class="form-label">Nom d'utilisateur ou E-mail</label>
            <input type="text" class="form-control" id="login" name="login" required autofocus>
        </div>

        <div class="mb-3">
            <label for="newpassword" class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="newpassword" name="password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Confirmer le nouveau mot de passe</button>
        </div>

        <p class="mt-3 text-center">
            <i>Vous avez déjà un compte ?</i><br>
            <a href="<?php echo e(route('login')); ?>">Se connecter</a>
        </p>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\FATY\Desktop\projet-stage\resources\views/auth/loginReset.blade.php ENDPATH**/ ?>