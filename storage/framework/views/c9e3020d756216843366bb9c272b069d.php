<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des événements</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 80px;
        }
        .header .text {
            margin-top: 5px;
            font-size: 13px;
            font-weight: bold;
        }
        h1 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 18px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="<?php echo e(asset('images/R.png')); ?>" alt="Logo" />
        <div class="text">
            Wilaya de la région de l’Oriental<br>
            Préfecture Oujda Angad
        </div>
    </div>

    <h1>Liste des événements</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Date début</th>
                <th>Heure</th>
                <th>Date fin</th>
                <th>Lieu</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $evenements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evenement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($evenement->id); ?></td>
                    <td><?php echo e($evenement->titre); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($evenement->date_de_début)->format('d/m/Y')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($evenement->heure)->format('H:i')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($evenement->date_de_fin)->format('d/m/Y')); ?></td>
                    <td><?php echo e($evenement->lieu); ?></td>
                    <td><?php echo e($evenement->type ? $evenement->type->nom : 'N/A'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</body>
</html>
<?php /**PATH C:\Users\lenovo\Documents\projet-stage\resources\views/evenements/pdf.blade.php ENDPATH**/ ?>