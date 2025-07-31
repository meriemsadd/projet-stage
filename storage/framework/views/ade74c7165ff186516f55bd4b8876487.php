<?php $__env->startSection('title', 'Créer un événement'); ?>

<?php $__env->startSection('content'); ?>
<style>
    body {
        background: linear-gradient(135deg, #e6f4ea, #c6e6c9);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
        padding-bottom: 3rem;
    }

    nav.navbar {
        background-color: #004d40 !important;
        color: white;
        box-shadow: 0 4px 15px rgba(0, 77, 64, 0.4);
    }
    nav.navbar .navbar-brand {
        color: #a5d6a7 !important;
        font-weight: 700;
        font-size: 1.3rem;
    }
    nav.navbar .btn-outline-primary {
        color: #a5d6a7;
        border-color: #a5d6a7;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    nav.navbar .btn-outline-primary:hover {
        background-color: #a5d6a7;
        color: #004d40;
    }
    nav.navbar .btn-outline-secondary {
        color: #f0f0f0;
        border-color: #f0f0f0;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    nav.navbar .btn-outline-secondary:hover {
        background-color: #f0f0f0;
        color: #004d40;
    }

    .container {
        max-width: 650px;
        background: white;
        padding: 2.5rem 3rem;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(0, 77, 64, 0.15);
        margin: 2rem auto 5rem;
    }

    h2 {
        color: #004d40;
        font-weight: 700;
        text-align: center;
        margin-bottom: 1.8rem;
        text-shadow: 1px 1px 2px rgba(160, 212, 167, 0.6);
    }

    label.form-label {
        font-weight: 600;
        color: #00695c;
    }

    input.form-control, select.form-select {
        border: 2px solid #a5d6a7;
        border-radius: 12px;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }
    input.form-control:focus, select.form-select:focus {
        border-color: #004d40;
        box-shadow: 0 0 8px #004d40aa;
        outline: none;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #842029;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.8rem;
        box-shadow: 0 4px 12px rgba(229, 57, 53, 0.25);
    }
    .alert-danger ul {
        margin-bottom: 0;
        padding-left: 1.2rem;
    }

    .d-flex.gap-2 {
        justify-content: center;
        margin-top: 1.8rem;
    }

    button.btn-success {
        background: linear-gradient(135deg, #4caf50, #087f23);
        border: none;
        padding: 0.55rem 2.2rem;
        font-weight: 700;
        font-size: 1.1rem;
        border-radius: 30px;
        box-shadow: 0 6px 15px rgba(46, 125, 50, 0.4);
        transition: background-color 0.3s ease, transform 0.2s ease;
    }
    button.btn-success:hover {
        background: linear-gradient(135deg, #087f23, #4caf50);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(30, 90, 40, 0.6);
    }

    a.btn-secondary {
        padding: 0.55rem 2.2rem;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 30px;
        background-color: #9e9e9e;
        color: white !important;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    a.btn-secondary:hover {
        background-color: #6e6e6e;
        transform: translateY(-3px);
        text-decoration: none;
    }
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light px-4 mb-4">
    <a class="navbar-brand" href="#">Site Officiel de la Wilaya OUJDA ORIENTAL</a>

    <div class="ms-auto d-flex gap-2">
        <a href="<?php echo e(route('acceuil')); ?>" class="btn btn-outline-primary">← Accueil</a>
        <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-secondary">Se déconnecter</a>
    </div>
</nav>

<div class="container">
    <h2>Créer un nouvel événement</h2>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>⚠️ <?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <form action="<?php echo e(route('evenements.store')); ?>" method="POST" class="mt-4">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre de l'événement" required>
        </div>

        <div class="mb-3">
            <label for="lieu" class="form-label">Lieu</label>
            <input type="text" name="lieu" class="form-control" id="lieu" placeholder="Lieu de l'événement" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="description" placeholder="Brève description" required>
        </div>

        <div class="mb-3">
            <label for="date_de_début" class="form-label">Date de début</label>
            <input type="date" name="date_de_début" class="form-control" id="date_de_début" required>
        </div>

        <div class="mb-3">
            <label for="date_de_fin" class="form-label">Date de fin</label>
            <input type="date" name="date_de_fin" class="form-control" id="date_de_fin" required>
        </div>

        <div class="mb-3">
            <label for="heure" class="form-label">Heure</label>
            <input type="time" name="heure" class="form-control" id="heure" required>
        </div>

        <div class="mb-3">
            <label for="type_events_id" class="form-label">Type d'événement</label>
            <select name="type_events_id" id="type_events_id" class="form-select" required>
                <option value="">-- Choisir un type --</option>
                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->nom); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="d-flex gap-2 justify-content-center">
            <button type="submit" class="btn btn-success">Créer</button>
            <a href="<?php echo e(route('evenements.index')); ?>" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\FATY\Desktop\projet-stage\resources\views/evenements/create.blade.php ENDPATH**/ ?>