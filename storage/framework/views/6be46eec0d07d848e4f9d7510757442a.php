<?php $__env->startSection('title', 'Se connecter'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Connexion</h2>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('login')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="login" class="form-label">Nom d'utilisateur ou E-mail</label>
            <input type="text" class="form-control" id="login" name="login" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>

        <p class="mt-3 text-center">
            <i>Vous avez oublié votre mot de passe ?</i><br>
            <a href="<?php echo e(route('loginReset')); ?>">Réinitialiser mot de passe</a>
        </p>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\projet-stage\resources\views/auth/login.blade.php ENDPATH**/ ?>