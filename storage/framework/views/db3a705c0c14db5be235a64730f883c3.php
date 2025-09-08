<?php $__env->startSection('title', 'Liste des utilisateurs'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap');

    body {
        font-family: 'Raleway', sans-serif;
        background: #f4f9f9;
        margin: 0;
        padding: 0;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(90deg, #00796b, #004d40);
        padding: 28px 36px;
        border-radius: 14px;
        color: white;
        margin-bottom: 30px;
        box-shadow: 0 12px 28px rgba(0, 121, 107, 0.35);
        font-size: 2.4rem;
        font-weight: 700;
        letter-spacing: 1.1px;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.3);
    }

    .header a.btn {
        background: #ffffffdd;
        color: #00796b;
        font-weight: 700;
        padding: 12px 28px;
        border-radius: 30px;
        box-shadow:
            0 4px 12px rgba(0, 121, 107, 0.3),
            inset 0 -3px 10px rgba(255, 255, 255, 0.8);
        transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
        font-size: 1.1rem;
        backdrop-filter: blur(10px);
        border: 1.5px solid #00796b;
        text-decoration: none;
    }
    .header a.btn:hover {
        background: #00796b;
        color: #e0f2f1;
        box-shadow:
            0 8px 18px rgba(0, 121, 107, 0.7),
            inset 0 3px 10px rgba(255, 255, 255, 0.3);
        transform: scale(1.07) rotate(-1deg);
        border-color: #004d40;
    }

    .table-container {
        background: #ffffffcc;
        border-radius: 20px;
        padding: 10px;
        box-shadow:
            0 12px 20px rgba(0, 0, 0, 0.12),
            0 4px 12px rgba(0, 0, 0, 0.08);
        backdrop-filter: saturate(180%) blur(15px);
        border: 1px solid #00796b33;
        overflow-x: auto;
        width: 100vw;
        margin-left: calc(-50vw + 50%);
    }

    table {
        width: 100vw; /* full viewport width */
        min-width: 900px; /* minimal width */
        border-collapse: separate;
        border-spacing: 0 14px;
        font-size: 0.9rem;
        color: #004d40;
        font-weight: 500;
        table-layout: fixed;
    }

    thead tr th {
        background: linear-gradient(45deg, #00796bcc, #004d4088);
        color: #e0f2f1;
        font-weight: 700;
        font-size: 1rem;
        padding: 16px 10px;
        text-transform: uppercase;
        border-radius: 12px 12px 0 0;
        box-shadow:
            0 4px 12px rgba(0, 121, 107, 0.6);
        user-select: none;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-align: center;
    }

    tbody tr {
        background: #e0f2f1dd;
        box-shadow:
            0 3px 15px rgba(0, 121, 107, 0.15);
        border-radius: 14px;
        transition: transform 0.25s ease, box-shadow 0.3s ease;
    }
    tbody tr:hover {
        background: #b2dfdbff;
        transform: translateY(-4px);
        box-shadow:
            0 8px 22px rgba(0, 121, 107, 0.3);
    }

    tbody tr td {
        padding: 12px 10px;
        vertical-align: middle;
        border: none;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        text-align: center;
    }

    /* Largeurs fixes par colonne */
    td:nth-child(1), th:nth-child(1) { width: 5%; }    /* ID petit */
    td:nth-child(2), th:nth-child(2) { width: 25%; }   /* Username */
    td:nth-child(3), th:nth-child(3) { width: 35%; }   /* Email */
    td:nth-child(4), th:nth-child(4) { width: 15%; }   /* Service */
    td:nth-child(5), th:nth-child(5) { width: 20%; }   /* Actions */

    .fw-semibold {
        font-weight: 700;
    }

    /* Boutons */
    .btn-sm {
        font-size: 0.85rem;
        padding: 6px 14px;
        border-radius: 28px;
        font-weight: 700;
        box-shadow: 0 4px 10px rgba(0,0,0,0.07);
        transition: all 0.3s ease;
        letter-spacing: 0.03em;
        white-space: nowrap;
        margin: 0 4px;
    }

    .btn-info {
        background-color: #00796b;
        color: white;
        border: 1.5px solid #004d40;
        text-shadow: 0 1px 1px rgba(0,0,0,0.2);
    }
    .btn-info:hover {
        background-color: #004d40;
        box-shadow: 0 6px 15px #004d40aa;
        color: #a7ffeb;
        transform: scale(1.05);
    }

    .btn-warning {
        background: linear-gradient(45deg, #ffd54f, #ffb300);
        border: none;
        color: #4e342e;
        text-shadow: 0 1px 0 rgba(255,255,255,0.4);
        box-shadow: 0 3px 10px #ffb300aa;
    }
    .btn-warning:hover {
        background: linear-gradient(45deg, #ffca28, #ffa000);
        color: #3e2723;
        box-shadow: 0 6px 18px #ffa000cc;
        transform: scale(1.06);
    }

    .btn-danger {
        background: linear-gradient(45deg, #ef5350, #d32f2f);
        border: none;
        color: white;
        text-shadow: 0 1px 1px rgba(0,0,0,0.25);
        box-shadow: 0 3px 10px #d32f2faa;
    }
    .btn-danger:hover {
        background: linear-gradient(45deg, #e53935, #b71c1c);
        box-shadow: 0 6px 20px #b71c1ccc;
        transform: scale(1.06);
    }

    /* Alert */
    .alert-info {
        background-color: #d0f0dd;
        color: #2e7d32;
        border: none;
        font-size: 1.15rem;
        font-weight: 600;
        border-radius: 14px;
        padding: 18px 20px;
        box-shadow: 0 4px 16px rgba(46, 125, 50, 0.25);
        margin-top: 40px;
        text-align: center;
    }

    /* Responsive tweaks */
    @media (max-width: 767px) {
        .header {
            flex-direction: column;
            gap: 20px;
            font-size: 1.8rem;
            padding: 18px 24px;
        }

        table, thead tr th, tbody tr td {
            font-size: 0.8rem;
            white-space: normal;
        }
        td:nth-child(1), th:nth-child(1),
        td:nth-child(5), th:nth-child(5) {
            width: auto;
        }
    }
</style>

<div style="width: 100vw; margin-left: calc(-50vw + 50%); padding: 10px 20px;">
    <div class="header">
        Liste des utilisateurs
        <a href="<?php echo e(route('users.create')); ?>" class="btn shadow">
            + Ajouter un utilisateur
        </a>
    </div>

    <div class="container my-4">
        <form class="d-flex flex-wrap gap-3 justify-content-center" action="<?php echo e(route('users.index')); ?>" method="GET">
            <input class="form-control w-25" type="search" placeholder="Rechercher un utilisateur..." name="search" value="<?php echo e(request('search')); ?>" />
            <button class="btn btn-primary" type="submit">🔎 Rechercher</button>
        </form>
    </div>

    <?php if($users->isEmpty()): ?>
        <div class="alert alert-info">
            Aucun utilisateur trouvé.
        </div>
    <?php else: ?>
        <div class="table-container">
            <table class="table table-hover text-center align-middle mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom d'utilisateur</th>
                        <th>Email</th>
                        <th>Service</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="fw-semibold"><?php echo e($user->id); ?></td>
                            <td class="fw-semibold text-truncate" style="max-width: 250px;" title="<?php echo e($user->username); ?>"><?php echo e($user->username); ?></td>
                            <td class="text-truncate" style="max-width: 350px;" title="<?php echo e($user->email); ?>"><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->service?->nom ?? '-'); ?></td>
                            <td>
                                <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-sm btn-warning">Modifier</a>
                                <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <?php echo e($users->links()); ?> 
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\projet-stage\resources\views/users/index.blade.php ENDPATH**/ ?>