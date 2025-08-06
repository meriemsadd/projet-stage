<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier participant</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #00695c;
            --primary-light: #b2dfdb;
            --accent-color: #ff8f00;
            --text-dark: #263238;
            --text-light: #eceff1;
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 8px rgba(0, 0, 0, 0.15);
            --radius: 8px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: var(--text-dark);
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-md);
        }

        h1 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            position: relative;
            padding-bottom: 15px;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--primary-color);
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: var(--radius);
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(0, 105, 92, 0.2);
        }

        button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: var(--radius);
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }

        button:hover {
            background: #004d40;
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        button i {
            margin-right: 8px;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            color: #004d40;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-user-edit"></i> Modifier Participant</h1>

        <form action="<?php echo e(route('participants.update', $participant->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="nom"><i class="fas fa-id-card"></i> Nom :</label>
                <input type="text" id="nom" name="nom" value="<?php echo e($participant->nom); ?>" required>
            </div>

            <div class="form-group">
                <label for="prenom"><i class="fas fa-id-card"></i> Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo e($participant->prenom); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email :</label>
                <input type="email" id="email" name="email" value="<?php echo e($participant->email); ?>" required>
            </div>

            <div class="form-group">
                <label for="evenement_id"><i class="fas fa-calendar-alt"></i> Événement :</label>
                <select id="evenement_id" name="evenement_id" required>
                    <?php $__currentLoopData = $evenements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($e->id); ?>" <?php echo e($participant->evenement_id == $e->id ? 'selected' : ''); ?>>
                            <?php echo e($e->titre); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <button type="submit"><i class="fas fa-save"></i> Enregistrer</button>
        </form>

        <a href="<?php echo e(url()->previous()); ?>" class="back-link"><i class="fas fa-arrow-left"></i> Retour</a>
    </div>
</body>
</html><?php /**PATH C:\Users\lenovo\projet-stage\resources\views/participants/edit.blade.php ENDPATH**/ ?>