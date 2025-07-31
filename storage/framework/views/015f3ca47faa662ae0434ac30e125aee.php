<?php $__env->startSection('title', 'Créer un événement'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap');

        body {
            font-family: 'Raleway', sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #ffffff);
            min-height: 100vh;
            padding-bottom: 3rem;
        }

        .container {
            max-width: 650px;
            background: white;
            padding: 2.5rem 3rem;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 77, 64, 0.15);
            margin: 2rem auto 5rem;
            transition: transform 0.3s ease;
        }
        .container:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 40px rgba(0, 77, 64, 0.25);
        }

        h2 {
            color: #004d40;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1.8rem;
            text-shadow: 1px 1px 2px rgba(160, 212, 167, 0.6);
            font-size: 2rem;
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
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }
        input.form-control:focus, select.form-select:focus {
            border-color: #004d40;
            box-shadow: 0 0 12px #004d40aa;
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
            margin-top: 2rem;
        }

        button.btn-success {
            background: linear-gradient(135deg, #4caf50, #087f23);
            border: none;
            padding: 0.55rem 2.4rem;
            font-weight: 700;
            font-size: 1.1rem;
            border-radius: 30px;
            box-shadow: 0 6px 15px rgba(46, 125, 50, 0.4);
            transition: background-color 0.3s ease, transform 0.25s ease, box-shadow 0.3s ease;
        }
        button.btn-success:hover {
            background: linear-gradient(135deg, #087f23, #4caf50);
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(30, 90, 40, 0.7);
        }

        a.btn-secondary {
            padding: 0.55rem 2.4rem;
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 30px;
            background-color: #9e9e9e;
            color: white !important;
            transition: background-color 0.3s ease, transform 0.25s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(158, 158, 158, 0.6);
        }
        a.btn-secondary:hover {
            background-color: #6e6e6e;
            transform: translateY(-4px);
            text-decoration: none;
            box-shadow: 0 7px 20px rgba(110, 110, 110, 0.9);
        }

        nav.navbar {
            background: linear-gradient(90deg, #00796b, #004d40) !important;
            box-shadow: 0 6px 20px rgba(0, 77, 64, 0.35);
        }
        nav.navbar .navbar-brand {
            color: white !important;
            font-weight: 700;
            font-size: 1.3rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
        nav.navbar .btn-outline-primary {
            color: #a5d6a7;
            border-color: #a5d6a7;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 25px;
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
            border-radius: 25px;
        }
        nav.navbar .btn-outline-secondary:hover {
            background-color: #f0f0f0;
            color: #004d40;
        }

        /* Preview image */
        #preview-image {
            display: block;
            margin: 1rem auto 1.5rem auto;
            max-width: 100%;
            max-height: 250px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 77, 64, 0.3);
            object-fit: contain;
        }

        @media (max-width: 576px) {
            .container {
                padding: 2rem 1.5rem;
                margin: 1rem 1rem 3rem;
            }
            h2 {
                font-size: 1.75rem;
            }
        }
    </style>

    
    <nav class="navbar navbar-expand-lg px-4 mb-4">
        <a class="navbar-brand" href="#">Wilaya de la Région de l'Oriental</a>
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

        
        <form action="<?php echo e(route('evenements.store')); ?>" method="POST" enctype="multipart/form-data" class="mt-4">
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

            
            <div class="mb-3">
                <label for="image" class="form-label">Image de l'événement (jpg, png, max 2MB)</label>
                <input 
                    type="file" 
                    name="image" 
                    class="form-control" 
                    id="image" 
                    accept="image/png, image/jpeg" 
                    onchange="previewImage(event)"
                >
                <img id="preview-image" src="#" alt="Aperçu image" style="display:none;">
            </div>

            
            <div class="mb-3">
                <label class="form-label d-block">Événement certifié</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="certifie" id="certifie_oui" value="1" required>
                    <label class="form-check-label" for="certifie_oui">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="certifie" id="certifie_non" value="0" required>
                    <label class="form-check-label" for="certifie_non">Non</label>
                </div>
            </div>

            <div class="d-flex gap-2 justify-content-center">
                <button type="submit" class="btn btn-success">Créer</button>
                <a href="<?php echo e(route('evenements.index')); ?>" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview-image');
            if (input.files && input.files[0]) {
                const file = input.files[0];
                // Vérifier taille max 2MB
                if (file.size > 2 * 1024 * 1024) {
                    alert('La taille du fichier ne doit pas dépasser 2 Mo.');
                    input.value = "";
                    preview.style.display = 'none';
                    return;
                }
                // Vérifier extension (déjà via accept mais double-check)
                const validTypes = ['image/jpeg', 'image/png'];
                if (!validTypes.includes(file.type)) {
                    alert('Format invalide. Veuillez choisir un fichier JPG ou PNG.');
                    input.value = "";
                    preview.style.display = 'none';
                    return;
                }
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\projet-stage\resources\views/evenements/create.blade.php ENDPATH**/ ?>