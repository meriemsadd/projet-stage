<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $__env->yieldContent("title", "Wilaya De L'Oriental"); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #ffffff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #00796b;
            padding: 0.75rem 1.5rem;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.25rem;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .navbar-brand img {
            height: 60px;
            width: auto;
        }
        .btn-outline-light {
            color: white !important;
            font-weight: 600;
            border-color: white !important;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }
        .btn-outline-light:hover {
            background-color: white !important;
            color: #00796b !important;
        }
        .container-main {
            flex-grow: 1;
            padding: 3rem 1rem 5rem 1rem;
            max-width: 1200px;
            margin: auto;
        }
        .section-title {
            text-align: center;
            margin-bottom: 2.5rem;
            font-size: 2.5rem;
            font-weight: 700;
            color: #004d40;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        }
        .event-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            background: white;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.2);
        }
        .event-image {
            height: 180px;
            width: 100%;
            object-fit: cover;
            position: relative;
        }
        .badge-position {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 0.5rem 0.9rem;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            color: white;
            text-transform: uppercase;
        }
        .badge-avenir { background-color: #4caf50; }
        .badge-encours { background-color: #ff9800; }
        .badge-passe { background-color: #f44336; }
        .card-body {
            flex-grow: 1;
            padding: 1.3rem 1.5rem;
            display: flex;
            flex-direction: column;
        }
        .card-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #00695c;
            margin-bottom: 0.7rem;
        }
        .card-text {
            color: #444;
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
            flex-grow: 1;
        }
        .btn-details {
            align-self: flex-start;
            background-color: #00796b;
            border: none;
            font-weight: 600;
            padding: 0.45rem 1.3rem;
            border-radius: 25px;
            transition: background-color 0.3s ease;
            color: white;
        }
        .btn-details:hover {
            background-color: #004d40;
            color: white;
        }
        footer.footer {
            background-color: #004d40;
            color: #e0f2f1;
            text-align: center;
            padding: 1.8rem 1rem;
            font-weight: 500;
            font-size: 0.95rem;
            margin-top: auto;
        }
        .about-section {
            max-width: 800px;
            margin: 4rem auto 3rem auto;
            color: #004d40;
            font-size: 1.05rem;
            text-align: center;
            padding: 0 1rem;
            line-height: 1.6;
        }
        @media (max-width: 767px) {
            .event-image {
                height: 150px;
            }
            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-4">
           <a class="navbar-brand d-flex flex-column align-items-start" href="<?php echo e(route('acceuil')); ?>">
             <img src="<?php echo e(asset('images/R.png')); ?>" alt="Logo" />
            <span style="font-size: 0.85rem; font-weight: 500;">
             Wilaya de la région de l’Oriental<br>Préfecture Oujda Angad
            </span>
           </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <form class="d-flex w-100 gap-3" action="<?php echo e(route('evenements.index')); ?>" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Rechercher un événement..." name="q" value="<?php echo e(request('q')); ?>" />
                    <select name="type" class="form-select w-auto">
                        <option value="">Tous les types</option>
                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type->id); ?>" <?php echo e(request('type') == $type->id ? 'selected' : ''); ?>>
                                <?php echo e($type->nom); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <button class="btn btn-outline-light" type="submit">🔎</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="container-main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        &copy; <?php echo e(now()->year); ?> Wilaya Oujda-Angad. Tous droits réservés. &nbsp;&nbsp; | &nbsp;&nbsp; 
        <a href="#" class="text-light text-decoration-none">Mentions légales</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
        <a href="#" class="text-light text-decoration-none">Politique de confidentialité</a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\lenovo\projet-stage\resources\views/layouts/app.blade.php ENDPATH**/ ?>