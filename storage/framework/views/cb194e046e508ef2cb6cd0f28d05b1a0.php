<?php $__env->startSection('title', 'Inscription des participants'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap');

    .container {
        max-width: 600px;
        background: #ffffffcc;
        padding: 30px 36px;
        border-radius: 20px;
        box-shadow:
            0 16px 30px rgba(0, 121, 107, 0.3),
            0 6px 18px rgba(0, 0, 0, 0.06);
        margin: 40px auto 60px auto;
        font-family: 'Raleway', sans-serif;
    }

    h1 {
        color: #00796b;
        font-weight: 700;
        font-size: 2rem;
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
    }

    form label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #004d40;
        user-select: none;
    }

    form input[type="text"],
    form input[type="email"],
    form select {
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
    form input[type="text"]:focus,
    form input[type="email"]:focus,
    form select:focus {
        border-color: #004d40;
        outline: none;
        box-shadow: 0 0 10px #004d40aa;
        background: #e0f2f1;
    }

    /* Signature canvas */
    #signature-pad {
        display: block;
        margin-bottom: 10px;
        border: 1.5px solid #00796b;
        border-radius: 12px;
        width: 100%;
        max-width: 100%;
        height: 200px;
        touch-action: none;
        background: #f0f8f7;
        cursor: crosshair;
    }

    button {
        background: linear-gradient(45deg, #4caf50, #087f23);
        color: white;
        font-weight: 700;
        padding: 12px 28px;
        border: none;
        border-radius: 30px;
        box-shadow: 0 6px 20px #19692cbb;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.25s ease;
        margin-top: 10px;
    }
    button:hover {
        background: linear-gradient(45deg, #087f23, #4caf50);
        transform: scale(1.05);
    }

    .btn-clear {
        background: #ccccccdd;
        color: #555;
        font-weight: 700;
        margin-left: 10px;
        padding: 12px 24px;
        border-radius: 30px;
        box-shadow: inset 0 -3px 8px #ffffffaa;
        transition: background-color 0.3s ease, transform 0.25s ease;
    }
    .btn-clear:hover {
        background: #999999;
        color: white;
        box-shadow: 0 6px 15px #555555bb;
        transform: scale(1.05);
    }

    /* Erreurs */
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
</style>

<div class="container">
    <h1>Inscription à : <?php echo e($evenement->titre); ?></h1>

    
    <?php if($errors->any()): ?>
        <div class="errors">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('participants.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo e(old('nom')); ?>" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo e(old('prenom')); ?>" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required>

        <label for="profession">Profession :</label>
        <input type="text" id="profession" name="profession" value="<?php echo e(old('profession')); ?>">

        <label for="organisme_id">Organisme (facultatif) :</label>
        <select id="organisme_id" name="organisme_id">
            <option value="">-- Aucun / Non spécifié --</option>
            <?php $__currentLoopData = $organismes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organisme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($organisme->id); ?>" <?php echo e(old('organisme_id') == $organisme->id ? 'selected' : ''); ?>>
                    <?php echo e($organisme->nom); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="signature">Signature :</label>
        <canvas id="signature-pad" width="400" height="200"></canvas>
        <input type="hidden" name="signature" id="signature">
        <button type="button" class="btn-clear" onclick="clearSignature()">Effacer</button>

        <input type="hidden" name="evenement_id" value="<?php echo e($evenement->id); ?>">

        <button type="submit">Enregistrer</button>
    </form>
</div>

<script>
    const canvas = document.getElementById('signature-pad');
    const signatureInput = document.getElementById('signature');
    const ctx = canvas.getContext('2d');
    let drawing = false;
    let lastX = 0;
    let lastY = 0;

    canvas.addEventListener('mousedown', function (e) {
        drawing = true;
        const rect = canvas.getBoundingClientRect();
        lastX = e.clientX - rect.left;
        lastY = e.clientY - rect.top;
    });

    canvas.addEventListener('mouseup', () => drawing = false);
    canvas.addEventListener('mouseleave', () => drawing = false);

    canvas.addEventListener('mousemove', function (e) {
        if (!drawing) return;
        const rect = canvas.getBoundingClientRect();
        const currentX = e.clientX - rect.left;
        const currentY = e.clientY - rect.top;

        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';
        ctx.beginPath();
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(currentX, currentY);
        ctx.stroke();

        lastX = currentX;
        lastY = currentY;
    });

    function clearSignature() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        signatureInput.value = '';
    }

    // On soumet le formulaire, on sauvegarde l'image en base64
    document.querySelector('form').addEventListener('submit', function () {
        signatureInput.value = canvas.toDataURL();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\FATY\Desktop\projet-stage\resources\views/participants/create.blade.php ENDPATH**/ ?>