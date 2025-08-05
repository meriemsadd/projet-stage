<?php $__env->startSection('title', "Accueil - Wilaya De L'Oriental"); ?>

<?php $__env->startSection('styles'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap');

    :root {
        --primary-color: #00796b;
        --primary-dark: #004d40;
        --primary-light: #b2dfdb;
        --accent-color: #ff9800;
        --text-dark: #263238;
        --text-light: #eceff1;
        --gradient-primary: linear-gradient(135deg, #00796b, #004d40);
        --gradient-accent: linear-gradient(135deg, #ff9800, #f57c00);
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f7fa;
        color: var(--text-dark);
        overflow-x: hidden;
    }

    .hero-section {
        position: relative;
        height: 80vh;
        min-height: 600px;
        background: var(--gradient-primary), 
                    url('https://images.unsplash.com/photo-1581434681381-81b5b1a82f33?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        padding: 0 2rem;
        overflow: hidden;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 1200px;
        padding: 2rem;
        background-color: rgba(0, 77, 64, 0.7);
        border-radius: 20px;
        backdrop-filter: blur(8px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        animation: fadeInUp 0.8s ease-out;
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-subtitle {
        font-size: 1.5rem;
        margin-bottom: 2.5rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
    }

    .search-container {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
    }

    .search-form {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        justify-content: center;
    }

    .search-input {
        flex: 1;
        min-width: 300px;
        padding: 1rem 1.5rem;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.25);
        transform: translateY(-2px);
    }

    .search-select {
        padding: 1rem;
        border: none;
        border-radius: 50px;
        font-size: 1rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        appearance: none;
        background-color: white;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1em;
        padding-right: 2.5rem;
    }

    .search-btn {
        padding: 1rem 2.5rem;
        background: var(--gradient-accent);
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 5px 20px rgba(255, 152, 0, 0.4);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .search-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 152, 0, 0.5);
        background: linear-gradient(135deg, #f57c00, #e65100);
    }

    .section-title {
        text-align: center;
        margin: 5rem 0 3rem;
        position: relative;
    }

    .section-title h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2.8rem;
        font-weight: 700;
        color: var(--primary-dark);
        display: inline-block;
        position: relative;
    }

    .section-title h2::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--gradient-accent);
        border-radius: 2px;
    }

    .events-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .events-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 5rem;
    }

    .event-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.6s ease forwards;
    }

    .event-card:nth-child(1) { animation-delay: 0.1s; }
    .event-card:nth-child(2) { animation-delay: 0.2s; }
    .event-card:nth-child(3) { animation-delay: 0.3s; }
    .event-card:nth-child(4) { animation-delay: 0.4s; }
    .event-card:nth-child(5) { animation-delay: 0.5s; }

    .event-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .event-image-container {
        height: 200px;
        position: relative;
        overflow: hidden;
    }

    .event-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .event-card:hover .event-image {
        transform: scale(1.05);
    }

    .event-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        padding: 0.5rem 1.2rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        color: white;
        text-transform: uppercase;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 2;
    }

    .badge-upcoming {
        background: var(--gradient-primary);
    }

    .badge-ongoing {
        background: var(--gradient-accent);
    }

    .badge-past {
        background: linear-gradient(135deg, #616161, #424242);
    }

    .event-content {
        padding: 1.5rem;
    }

    .event-title {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 0.8rem;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
    }

    .event-meta {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.8rem;
        color: #546e7a;
        font-size: 0.9rem;
    }

    .event-meta i {
        color: var(--primary-color);
    }

    .event-creator {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.8rem;
        font-size: 0.85rem;
        color: #607d8b;
    }

    .event-creator i {
        color: var(--accent-color);
    }

    .event-description {
        color: #607d8b;
        margin-bottom: 1.5rem;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .event-btn {
        display: inline-block;
        padding: 0.7rem 1.5rem;
        background: var(--gradient-primary);
        color: white;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 121, 107, 0.3);
    }

    .event-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 121, 107, 0.4);
        color: white;
        background: linear-gradient(135deg, #00695c, #003d33);
    }

    .about-section {
        background: var(--gradient-primary);
        color: white;
        padding: 5rem 2rem;
        margin-top: 5rem;
        position: relative;
        overflow: hidden;
    }

    .about-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .about-content h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        position: relative;
        display: inline-block;
    }

    .about-content h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 3px;
        background: var(--accent-color);
    }

    .about-content p {
        line-height: 1.8;
        margin-bottom: 1.5rem;
        font-size: 1.1rem;
    }

    .about-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        transition: transform 0.5s ease;
    }

    .about-image:hover {
        transform: scale(1.03);
    }

    .about-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .about-pattern {
        position: absolute;
        opacity: 0.05;
        z-index: 1;
    }

    .pattern-1 {
        top: -50px;
        right: -50px;
        width: 300px;
        height: 300px;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='1' fill-rule='evenodd'/%3E%3C/svg%3E");
    }

    .pattern-2 {
        bottom: -50px;
        left: -50px;
        width: 400px;
        height: 400px;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='1' fill-rule='evenodd'/%3E%3C/svg%3E");
    }

    .no-events {
        text-align: center;
        grid-column: 1 / -1;
        padding: 3rem;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .no-events i {
        font-size: 3rem;
        color: #b0bec5;
        margin-bottom: 1.5rem;
    }

    .no-events h3 {
        font-size: 1.8rem;
        color: #546e7a;
        margin-bottom: 1rem;
    }

    .no-events p {
        color: #78909c;
        font-size: 1.1rem;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive styles */
    @media (max-width: 992px) {
        .hero-title {
            font-size: 2.8rem;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
        }
        
        .about-container {
            grid-template-columns: 1fr;
        }
        
        .about-image {
            order: -1;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            height: auto;
            padding: 6rem 1rem;
        }
        
        .hero-title {
            font-size: 2.2rem;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
        }
        
        .search-form {
            flex-direction: column;
        }
        
        .search-input, .search-select, .search-btn {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .events-grid {
            grid-template-columns: 1fr;
        }
        
        .hero-title {
            font-size: 1.8rem;
        }
        
        .section-title h2 {
            font-size: 1.8rem;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Wilaya De L'Oriental</h1>
            <p class="hero-subtitle">Découvrez les événements culturels, sociaux et économiques de notre région. Participez aux activités qui façonnent notre communauté.</p>
            
            <div class="search-container">
                <form class="search-form" action="<?php echo e(route('acceuil')); ?>" method="GET">
                    <input type="search" class="search-input" placeholder="Rechercher un événement..." name="search" value="<?php echo e(request('search')); ?>" />
                    <select name="type" class="search-select">
                        <option value="">Tous les types</option>
                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type->id); ?>" <?php echo e(request('type') == $type->id ? 'selected' : ''); ?>>
                                <?php echo e($type->nom); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i> Rechercher
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section>
        <div class="section-title">
            <h2>Événements à venir</h2>
        </div>
        
        <div class="events-container">
            <div class="events-grid">
                <?php $__empty_1 = true; $__currentLoopData = $evenements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="event-card">
                        <div class="event-image-container">
                            <?php if($event->image): ?>
                                <img src="<?php echo e(asset('storage/' . $event->image)); ?>" alt="<?php echo e($event->titre); ?>" class="event-image">
                            <?php else: ?>
                                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="<?php echo e($event->titre); ?>" class="event-image">
                            <?php endif; ?>
                            <span class="event-badge <?php echo e($event->badge_class); ?>">
                                <?php echo e($event->status); ?>

                            </span>
                        </div>
                        <div class="event-content">
                            <h3 class="event-title"><?php echo e($event->titre); ?></h3>
                            
                            <div class="event-creator">
                                <i class="fas fa-user"></i>
                                <span>Créé par utilisateur #<?php echo e($event->user_id); ?></span>
                            </div>
                            
                            <div class="event-meta">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?php echo e($event->lieu); ?></span>
                            </div>
                            <div class="event-meta">
                                <i class="fas fa-calendar-alt"></i>
                                <span>
                                    <?php echo e(\Carbon\Carbon::parse($event->date_de_début)->format('d/m/Y')); ?> à <?php echo e($event->heure); ?>

                                </span>
                            </div>
                            <p class="event-description">
                                <?php echo e(Str::limit($event->description, 120)); ?>

                            </p>
                            <a href="<?php echo e(route('evenements.show', $event->id)); ?>" class="event-btn">
                                Voir détails <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="no-events">
                        <i class="far fa-calendar-alt"></i>
                        <h3>Aucun événement disponible</h3>
                        <p>Il n'y a pas d'événements programmés pour le moment. Revenez plus tard pour découvrir nos prochains événements.</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Pagination - Seulement si $evenements est une instance de LengthAwarePaginator -->
            <?php if(method_exists($evenements, 'links')): ?>
            <div class="d-flex justify-content-center mt-4">
                <?php echo e($evenements->links()); ?>

            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="about-pattern pattern-1"></div>
        <div class="about-pattern pattern-2"></div>
        
        <div class="about-container">
            <div class="about-content">
                <h2>À propos de la Wilaya Oujda Oriental</h2>
                <p>
                    La Wilaya Oujda Oriental est une administration publique engagée dans le développement local et
                    la gestion efficace des événements culturels, sociaux et économiques. Notre mission est de
                    promouvoir le développement régional et d'améliorer la qualité de vie des citoyens.
                </p>
                <p>
                    Ce portail vous permet de consulter les événements à venir, en cours et passés, et d'y participer
                    facilement. Nous nous efforçons de rendre l'information accessible à tous et de créer des opportunités
                    pour chaque membre de notre communauté.
                </p>
            </div>
            <div class="about-image">
                <img src="<?php echo e(asset('images/wilaya.png')); ?>" alt="Wilaya Oujda Oriental">
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Animation trigger when scrolling
    document.addEventListener('DOMContentLoaded', function() {
        const animateOnScroll = function() {
            const elements = document.querySelectorAll('.event-card');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                
                if (elementPosition < windowHeight - 100) {
                    element.style.animationPlayState = 'running';
                }
            });
        };
        
        // Run once on load
        animateOnScroll();
        
        // Run on scroll
        window.addEventListener('scroll', animateOnScroll);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\FATY\Desktop\projet-stage\resources\views/acceuil.blade.php ENDPATH**/ ?>