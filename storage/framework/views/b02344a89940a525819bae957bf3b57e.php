

<?php $__env->startSection('title', 'Modifier un utilisateur'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .container {
        max-width: 600px;
        background: white;
        padding: 2rem 2.5rem;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(0, 77, 64, 0.15);
        margin: 2rem auto 5rem;
        font-family: 'Raleway', sans-serif;
    }
    h2 {
        color: #004d40;
        font-weight: 700;
        text-align: center;
        margin-bottom: 1.8rem;
        font-size: 2rem;
    }
    label {
        font-weight: 600;
        color: #00695c;
    }
    input.form-control, select.form-select {
        border: 2px solid #a5d6a7;
        border-radius: 12px;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        margin-bottom: 1rem;
    }
    button.btn-success {
        background: linear-gradient(135deg, #4caf50, #087f23);
        border: none;
        padding: 0.55rem 2.4rem;
        font-weight: 700;
        font-size: 1.1rem;
        border-radius: 30px;
        cursor: pointer;
    }
    button.btn-success:hover {
        background: linear-gradient(135deg, #087f23, #4caf50);
        transform: translateY(-4px);
    }
    a.btn-secondary {
        padding: 0.55rem 2.4rem;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 30px;
        background-color: #9e9e9e;
        color: white !important;
        text-decoration: none;
        margin-left: 1rem;
    }
    a.btn-secondary:hover {
        background-color: #6e6e6e;
    }
</style>

<div class="container">
    <h2>Modifier l'utilisateur</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>⚠️ <?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo e(old('username', $user->username)); ?>" required>

        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email', $user->email)); ?>" required>

        <label for="password">Mot de passe (laisser vide pour ne pas changer)</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Nouveau mot de passe">

        <label for="service_id">Service (optionnel)</label>
        <select name="service_id" id="service_id" class="form-select">
            <option value="">-- Choisir un service --</option>
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($service->id); ?>" <?php echo e((old('service_id', $user->service_id) == $service->id) ? 'selected' : ''); ?>>
                    <?php echo e($service->nom); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <div style="text-align:center; margin-top: 2rem;">
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\FATY\Desktop\projet-stage\resources\views/users/edit.blade.php ENDPATH**/ ?>