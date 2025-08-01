<?php $__env->startSection('title', 'Réinitialiser le mot de passe'); ?>

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

        input.form-control {
            border: 2px solid #a5d6a7;
            border-radius: 12px;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }
        input.form-control:focus {
            border-color: #004d40;
            box-shadow: 0 0 12px #004d40aa;
            outline: none;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #842029;
            border-radius: 12px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 6px 18px rgba(229, 57, 53, 0.35);
            font-size: 1.15rem;
            line-height: 1.6;
            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }
        .alert-danger ul {
            margin-bottom: 0;
            padding-left: 1.2rem;
        }

        /* ✅ Nouveau style pour le bouton : tons verts */
        .btn-primary {
            background: linear-gradient(135deg, #26a69a, #004d40);
            border: none;
            padding: 0.55rem 2.4rem;
            font-weight: 700;
            font-size: 1.1rem;
            border-radius: 30px;
            box-shadow: 0 6px 15px rgba(0, 150, 136, 0.4);
            transition: background-color 0.3s ease, transform 0.25s ease, box-shadow 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #004d40, #26a69a);
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 105, 92, 0.7);
        }

        .text-center a {
            color: #00796b;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .text-center a:hover {
            color: #004d40;
            text-decoration: underline;
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

    <div class="container">
        <h2>Réinitialisation du mot de passe</h2>

        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>⚠️ <?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <form action="<?php echo e(route('loginReset')); ?>" method="POST" class="mt-4">
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

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary">Confirmer le nouveau mot de passe</button>
            </div>

            <p class="mt-4 text-center">
                <i>Vous avez déjà un compte ?</i><br>
                <a href="<?php echo e(route('login')); ?>">Se connecter</a>
            </p>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\projet-stage\resources\views/auth/loginReset.blade.php ENDPATH**/ ?>