<?php $__env->startSection('title', 'Détails de l\'événement'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;700;800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');

    :root {
        --primary: #00796b;
        --primary-dark: #004d40;
        --primary-light: #b2dfdb;
        --accent: #ffab00;
        --accent-dark: #ff6d00;
        --text-dark: #263238;
        --text-light: #eceff1;
    }

    .event-detail-container {
        max-width: 1024px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    /* Header with image section */
    .event-header {
        position: relative;
        margin-bottom: 2.5rem;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 121, 107, 0.15);
    }

    .event-title {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        padding: 1.5rem 2rem;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        position: relative;
    }

    .event-image-container {
        width: 100%;
        height: 400px;
        position: relative;
        overflow: hidden;
    }

    .event-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .event-image-container:hover .event-image {
        transform: scale(1.03);
    }

    /* Event details section */
    .event-details {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 18px;
        padding: 2.5rem;
        box-shadow: 0 10px 30px rgba(0, 121, 107, 0.1);
        margin-bottom: 2.5rem;
        position: relative;
        overflow: hidden;
    }

    .event-details::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%2300796b' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        z-index: 0;
    }

    .detail-item {
        position: relative;
        z-index: 1;
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    .detail-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0.35rem;
        width: 1.2rem;
        height: 1.2rem;
        background-color: var(--primary);
        mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M22 11.08V12a10 10 0 1 1-5.93-9.14'%3E%3C/path%3E%3Cpolyline points='22 4 12 14.01 9 11.01'%3E%3C/polyline%3E%3C/svg%3E");
        mask-repeat: no-repeat;
        background-size: contain;
    }

    .detail-label {
        font-weight: 700;
        color: var(--primary-dark);
        display: block;
        margin-bottom: 0.3rem;
        font-size: 1.1rem;
    }

    .detail-value {
        font-size: 1.15rem;
        color: var(--text-dark);
        line-height: 1.6;
    }

    .event-description {
        background: rgba(178, 223, 219, 0.2);
        border-left: 4px solid var(--primary);
        padding: 1.5rem;
        border-radius: 0 12px 12px 0;
        margin: 2rem 0;
        position: relative;
    }

    /* Participants section */
    .participants-section {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 18px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 121, 107, 0.1);
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        color: var(--primary-dark);
        font-size: 2rem;
        margin-bottom: 1.5rem;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60%;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), transparent);
    }

    /* Buttons */
    .action-buttons {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .btn-back {
        background: rgba(255, 255, 255, 0.9);
        color: var(--primary);
        border: 2px solid var(--primary);
        padding: 0.8rem 1.8rem;
        border-radius: 50px;
        font-weight: 700;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-back:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 121, 107, 0.3);
    }

    .btn-edit {
        background: linear-gradient(45deg, var(--accent), var(--accent-dark));
        color: #4e342e;
        border: none;
        padding: 0.8rem 1.8rem;
        border-radius: 50px;
        font-weight: 700;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(255, 171, 0, 0.3);
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 109, 0, 0.4);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .event-title {
            font-size: 1.8rem;
            padding: 1.2rem;
        }
        
        .event-image-container {
            height: 250px;
        }
        
        .event-details {
            padding: 1.5rem;
        }
        
        .detail-item {
            padding-left: 1.5rem;
        }
        
        .section-title {
            font-size: 1.6rem;
        }
    }
</style>

<div class="event-detail-container">
    <div class="action-buttons">
        <a href="<?php echo e(route('evenements.index')); ?>" class="btn-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
            Retour à la liste
        </a>
        <a href="<?php echo e(route('evenements.edit', $evenement->id)); ?>" class="btn-edit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
            Modifier
        </a>
    </div>

    <!-- Event Header with Title and Image -->
    <div class="event-header">
        <div class="event-title"><?php echo e($evenement->titre); ?></div>
        <?php if($evenement->image): ?>
        <div class="event-image-container">
            <img src="<?php echo e(asset('storage/' . $evenement->image)); ?>" alt="Image de l'événement" class="event-image">
        </div>
        <?php endif; ?>
    </div>

    <!-- Event Details -->
    <div class="event-details">
        <div class="detail-item">
            <span class="detail-label">Lieu</span>
            <span class="detail-value"><?php echo e($evenement->lieu); ?></span>
        </div>
        
        <div class="detail-item">
            <span class="detail-label">Date de début</span>
            <span class="detail-value"><?php echo e(\Carbon\Carbon::parse($evenement->date_debut)->format('d/m/Y')); ?></span>
        </div>
        
        <div class="detail-item">
            <span class="detail-label">Date de fin</span>
            <span class="detail-value"><?php echo e(\Carbon\Carbon::parse($evenement->date_fin)->format('d/m/Y')); ?></span>
        </div>
        
        <div class="detail-item">
            <span class="detail-label">Heure</span>
            <span class="detail-value"><?php echo e($evenement->heure); ?></span>
        </div>
        
        <div class="detail-item">
            <span class="detail-label">Type</span>
            <span class="detail-value"><?php echo e($evenement->type?->nom ?? 'Non défini'); ?></span>
        </div>
        
        <div class="event-description">
            <div class="detail-label">Description</div>
            <p class="detail-value"><?php echo e($evenement->description); ?></p>
        </div>
    </div>

    <!-- Participants Section -->
    <div class="participants-section">
        <h2 class="section-title">Participants</h2>
        
        <?php if($participants->count()): ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Profession</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($p->nom); ?></td>
                            <td><?php echo e($p->prenom); ?></td>
                            <td><?php echo e($p->email); ?></td>
                            <td><?php echo e($p->profession); ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?php echo e(route('participants.edit', $p->id)); ?>" class="btn btn-sm btn-primary">
                                        Modifier
                                    </a>
                                    <form action="<?php echo e(route('participants.destroy', $p->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                Aucun participant inscrit à cet événement.
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\FATY\Desktop\projet-stage\resources\views/evenements/show1.blade.php ENDPATH**/ ?>