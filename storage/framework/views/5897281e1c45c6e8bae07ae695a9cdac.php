<?php $__env->startSection('title', 'Se connecter'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap');

    .container-login {
        max-width: 600px; /* plus large */
        background: #ffffffcc;
        padding: 40px 48px; /* plus grand */
        border-radius: 20px;
        box-shadow:
            0 16px 30px rgba(0, 121, 107, 0.3),
            0 6px 18px rgba(0, 0, 0, 0.06);
        margin: 60px auto;
        font-family: 'Raleway', sans-serif;
    }

    h2 {
        color: #00796b;
        font-weight: 700;
        font-size: 1.8rem;
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #004d40;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px 14px;
        margin-bottom: 20px;
        border-radius: 12px;
        border: 1.5px solid #00796b;
        font-size: 1rem;
        color: #004d40;
        box-shadow: inset 0 1px 4px #a7ffeb44;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border-color: #004d40;
        outline: none;
        box-shadow: 0 0 10px #004d40aa;
        background: #e0f2f1;
    }

    button[type="submit"] {
        background: linear-gradient(135deg, #26a69a, #004d40);
        color: #fff;
        font-weight: 700;
        padding: 12px 28px;
        border: none;
        border-radius: 30px;
        font-size: 1.1rem;
        cursor: pointer;
        width: 100%;
        box-shadow: 0 6px 15px rgba(0, 150, 136, 0.4);
        transition: background-color 0.3s ease, transform 0.25s ease, box-shadow 0.3s ease;
    }

    button[type="submit"]:hover {
        background: linear-gradient(135deg, #004d40, #26a69a);
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0, 105, 92, 0.7);
    }

    .errors {
        background-color: #f8d7da;
        color: #842029;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.8rem;
        box-shadow: 0 4px 12px rgba(229, 57, 53, 0.25);
    }

    .errors ul {
        margin: 0;
        padding-left: 1.2rem;
    }

    .forgot {
        text-align: center;
        margin-top: 20px;
        font-size: 0.95rem;
    }

    .forgot a {
        color: #00796b;
        text-decoration: none;
        font-weight: 600;
    }

    .forgot a:hover {
        text-decoration: underline;
    }
</style>

<div class="container-login">
    <h2>Connexion</h2>

    <?php if($errors->any()): ?>
        <div class="errors">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('login')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <label for="login">Nom d'utilisateur ou E-mail</label>
        <input type="text" id="login" name="login" required autofocus>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>

        <div class="forgot">
            <p>Vous avez oublié votre mot de passe ?<br>
                <a href="<?php echo e(route('loginReset')); ?>">Réinitialiser mot de passe</a>
            </p>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\FATY\Desktop\projet-stage\resources\views/auth/login.blade.php ENDPATH**/ ?>