<?php $__env->startSection('title', 'Tableau de bord'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* Styles custom pour ce dashboard */
    .dashboard-container {
        margin-top: 50px;
        margin-bottom: 50px;
    }
    .dashboard-title {
        font-size: 2.8rem;
        font-weight: 900;
        color: #00695c;
        margin-bottom: 40px;
        text-align: center;
        text-shadow: 1px 1px 4px rgba(0,0,0,0.1);
    }
    .card-dashboard {
        border-radius: 20px;
        box-shadow: 0 12px 25px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        background: linear-gradient(145deg, #e0f2f1, #ffffff);
    }
    .card-dashboard:hover {
        transform: translateY(-15px);
        box-shadow: 0 18px 40px rgba(0,0,0,0.15);
        background: linear-gradient(145deg, #b2dfdb, #e0f7fa);
    }
    .card-body {
        padding: 2rem 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .card-icon {
        font-size: 4.5rem;
        margin-bottom: 15px;
        color: #00796b;
        transition: color 0.3s ease;
    }
    .card-dashboard:hover .card-icon {
        color: #004d40;
    }
    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #004d40;
        text-align: center;
    }
    .text-decoration-none:hover {
        text-decoration: none;
    }
</style>

<div class="container dashboard-container">
    <h1 class="dashboard-title">🧭 Tableau de bord</h1>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5">

        <div class="col">
            <a href="<?php echo e(route('evenements.create')); ?>" class="text-decoration-none">
                <div class="card card-dashboard h-100 shadow">
                    <div class="card-body">
                        <div class="card-icon">➕</div>
                        <h5 class="card-title">Ajouter un événement</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="<?php echo e(route('evenements.index')); ?>" class="text-decoration-none">
                <div class="card card-dashboard h-100 shadow">
                    <div class="card-body">
                        <div class="card-icon">📅</div>
                        <h5 class="card-title">Liste des événements</h5>
                    </div>
                </div>
            </a>
        </div>

        
        <div class="col">
            <a href="<?php echo e(route('users.index')); ?>" class="text-decoration-none">
                <div class="card card-dashboard h-100 shadow">
                    <div class="card-body">
                        <div class="card-icon">👥</div>
                        <h5 class="card-title">Gestion des utilisateurs</h5>
                    </div>
                </div>
            </a>
        </div>
        

        <div class="col">
            <a href="<?php echo e(route('statistiques')); ?>" class="text-decoration-none">
                <div class="card card-dashboard h-100 shadow">
                    <div class="card-body">
                        <div class="card-icon">📊</div>
                        <h5 class="card-title">Statistiques</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\FATY\Desktop\projet-stage\resources\views/dashboard.blade.php ENDPATH**/ ?>