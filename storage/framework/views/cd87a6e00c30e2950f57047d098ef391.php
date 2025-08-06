<?php $__env->startSection('title', 'Tableau de bord'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    :root {
        --primary-color: #00695c;
        --primary-dark: #004d40;
        --primary-light: #b2dfdb;
        --accent-color: #ff8f00;
        --text-dark: #263238;
        --text-light: #eceff1;
        --gradient-primary: linear-gradient(135deg, #00695c, #004d40);
        --gradient-accent: linear-gradient(135deg, #ff8f00, #ff6f00);
        --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 10px 20px rgba(0, 0, 0, 0.15);
        --shadow-lg: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .dashboard-container {
        margin-top: 30px;
        margin-bottom: 80px;
        animation: fadeIn 0.6s ease-out;
    }

    .dashboard-title {
        font-size: 3rem;
        font-weight: 800;
        color: var(--primary-dark);
        margin-bottom: 50px;
        text-align: center;
        position: relative;
        padding-bottom: 20px;
        letter-spacing: -0.5px;
    }

    .dashboard-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: var(--gradient-accent);
        border-radius: 2px;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 25px;
        padding: 20px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .card-dashboard {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        background: white;
        position: relative;
        z-index: 1;
        height: 100%;
    }

    .card-dashboard::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--gradient-primary);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .card-dashboard:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
    }

    .card-dashboard:hover::before {
        opacity: 0.1;
    }

    .card-body {
        padding: 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 100%;
    }

    .card-icon {
        font-size: 3rem;
        margin-bottom: 20px;
        color: var(--primary-color);
        transition: all 0.3s ease;
        background: linear-gradient(to right, var(--primary-color), var(--accent-color));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .card-dashboard:hover .card-icon {
        animation: pulse 1.5s infinite;
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 15px;
        position: relative;
    }

    .card-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 40px;
        height: 3px;
        background: var(--gradient-accent);
        border-radius: 3px;
        transition: width 0.3s ease;
    }

    .card-dashboard:hover .card-title::after {
        width: 60px;
    }

    .card-desc {
        color: #607d8b;
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 0;
    }

    .dashboard-link {
        text-decoration: none;
        transition: transform 0.3s ease;
    }

    .dashboard-link:hover {
        transform: scale(1.02);
    }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
        .dashboard-grid {
            grid-template-columns: repeat(2, 1fr);
            max-width: 800px;
        }
    }

    @media (max-width: 768px) {
        .dashboard-title {
            font-size: 2.2rem;
            margin-bottom: 40px;
        }
        
        .dashboard-grid {
            grid-template-columns: 1fr;
            max-width: 500px;
            gap: 20px;
        }
        
        .card-body {
            padding: 1.8rem;
        }
    }

    @media (max-width: 576px) {
        .dashboard-title {
            font-size: 1.8rem;
            padding-bottom: 15px;
        }
        
        .dashboard-title::after {
            width: 80px;
            height: 3px;
        }
        
        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .card-title {
            font-size: 1.2rem;
        }
        
        .card-desc {
            font-size: 0.85rem;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h1 class="dashboard-title">
        <i class="fas fa-tachometer-alt me-3"></i>Tableau de bord
    </h1>

    <div class="dashboard-grid">
        <!-- Carte Ajouter un événement -->
        <a href="<?php echo e(route('evenements.create')); ?>" class="dashboard-link">
            <div class="card card-dashboard">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <h3 class="card-title">Ajouter un événement</h3>
                    <p class="card-desc">Créer et publier un nouvel événement pour le calendrier</p>
                </div>
            </div>
        </a>

        <!-- Carte Liste des événements -->
        <a href="<?php echo e(route('evenements.index')); ?>" class="dashboard-link">
            <div class="card card-dashboard">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="card-title">Liste des événements</h3>
                    <p class="card-desc">Gérer et modifier les événements existants</p>
                </div>
            </div>
        </a>


        <!-- Carte Statistiques -->
        <a href="<?php echo e(route('statistiques')); ?>" class="dashboard-link">
            <div class="card card-dashboard">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-chart-bar"></i>
        
        <div class="col">
            <a href="<?php echo e(route('users.index')); ?>" class="text-decoration-none">
                <div class="card card-dashboard h-100 shadow">
                    <div class="card-body">
                        <div class="card-icon">👥</div>
                        <h5 class="card-title">Gestion des utilisateurs</h5>

                    </div>
                    <h3 class="card-title">Statistiques</h3>
                    <p class="card-desc">Analytiques et données sur les événements</p>
                </div>

            </div>
        </a>

            </a>
        </div>


        <!-- Carte Paramètres -->
        <a href="<?php echo e(route('parametres')); ?>" class="dashboard-link">
            <div class="card card-dashboard">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <h3 class="card-title">Paramètres</h3>
                    <p class="card-desc">Configurer les préférences de l'application</p>
                </div>
            </div>
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\FATY\Desktop\projet-stage\resources\views/dashboard.blade.php ENDPATH**/ ?>