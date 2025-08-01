<?php $__env->startSection('title', 'Inscription des participants'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap');

    body {
        background: linear-gradient(135deg, #e0f7fa, #f5fbfc);
        min-height: 100vh;
        margin: 0;
        padding: 2rem 0;
        font-family: 'Raleway', sans-serif;
    }

    .form-container {
        max-width: 600px;
        background: #ffffff;
        padding: 30px 36px;
        border-radius: 20px;
        box-shadow:
            0 16px 30px rgba(0, 121, 107, 0.3),
            0 6px 18px rgba(0, 0, 0, 0.06);
        margin: 0 auto;
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-title {
        color: #00796b;
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 10px;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
    }

    .event-title {
        color: #004d40;
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 30px;
        padding: 10px;
        background: rgba(178, 223, 219, 0.3);
        border-radius: 8px;
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
        padding: 12px 16px;
        margin-bottom: 20px;
        border-radius: 12px;
        border: 1.5px solid #00796b;
        font-size: 1rem;
        color: #004d40;
        box-shadow: inset 0 1px 4px #a7ffeb44;
        transition: all 0.3s ease;
    }

    form input[type="text"]:focus,
    form input[type="email"]:focus,
    form select:focus {
        border-color: #004d40;
        outline: none;
        box-shadow: 0 0 10px #004d40aa;
        background: #e0f2f1;
    }

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

    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 25px;
    }

    .btn-submit {
        background: linear-gradient(45deg, #4caf50, #087f23);
        color: white;
        font-weight: 700;
        padding: 12px 28px;
        border: none;
        border-radius: 30px;
        box-shadow: 0 6px 20px #19692cbb;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        flex: 1;
    }

    .btn-submit:hover {
        background: linear-gradient(45deg, #087f23, #4caf50);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px #19692cbb;
    }

    .btn-clear {
        background: #f5f5f5;
        color: #555;
        font-weight: 700;
        padding: 12px 24px;
        border: none;
        border-radius: 30px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-clear:hover {
        background: #e0e0e0;
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.15);
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

    @media (max-width: 768px) {
        .form-container {
            padding: 25px;
            margin: 0 15px;
        }

        .form-title {
            font-size: 1.8rem;
        }

        .form-actions {
            flex-direction: column;
            gap: 10px;
        }

        .btn-submit, .btn-clear {
            width: 100%;
        }
    }
</style>

<div class="form-container">
    <div class="form-header">
        <h1 class="form-title">Formulaire d'inscription</h1>
        <div class="event-title">
            Événement : <?php echo e($evenement->titre); ?>

        </div>
    </div>

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

        <div class="form-actions">
            <button type="button" class="btn-clear" onclick="clearSignature()">Effacer la signature</button>
            <button type="submit" class="btn-submit">S'inscrire</button>
        </div>

        <input type="hidden" name="evenement_id" value="<?php echo e($evenement->id); ?>">
    </form>
</div>

<script>
    const canvas = document.getElementById('signature-pad');
    const signatureInput = document.getElementById('signature');
    const ctx = canvas.getContext('2d');
    let drawing = false;
    let lastX = 0;
    let lastY = 0;

    ctx.strokeStyle = '#000';
    ctx.lineWidth = 2;
    ctx.lineCap = 'round';

    function startDrawing(e) {
        drawing = true;
        const pos = getPosition(e);
        lastX = pos.x;
        lastY = pos.y;
    }

    function draw(e) {
        if (!drawing) return;
        const pos = getPosition(e);
        ctx.beginPath();
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(pos.x, pos.y);
        ctx.stroke();
        lastX = pos.x;
        lastY = pos.y;
    }

    function stopDrawing() {
        drawing = false;
    }

    function getPosition(e) {
        const rect = canvas.getBoundingClientRect();
        return {
            x: (e.clientX || e.touches?.[0].clientX) - rect.left,
            y: (e.clientY || e.touches?.[0].clientY) - rect.top
        };
    }

    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('mouseleave', stopDrawing);

    canvas.addEventListener('touchstart', (e) => {
        e.preventDefault();
        startDrawing(e.touches[0]);
    });

    canvas.addEventListener('touchmove', (e) => {
        e.preventDefault();
        draw(e.touches[0]);
    });

    canvas.addEventListener('touchend', stopDrawing);

    function clearSignature() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        signatureInput.value = '';
    }

    function isCanvasBlank(c) {
        const blank = document.createElement('canvas');
        blank.width = c.width;
        blank.height = c.height;
        return c.toDataURL() === blank.toDataURL();
    }

    document.querySelector('form').addEventListener('submit', function (e) {
        if (isCanvasBlank(canvas)) {
            e.preventDefault();
            alert('Veuillez fournir une signature');
            return false;
        }
        signatureInput.value = canvas.toDataURL();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\projet-stage\resources\views/participants/create.blade.php ENDPATH**/ ?>