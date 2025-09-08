<?php $__env->startSection('title', 'Statistiques'); ?>

<?php $__env->startSection('styles'); ?>
<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f5f7fa;
    color: #333;
}
.stats-container {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 0 1rem;
}
.stats-header { 
    text-align: center; 
    margin-bottom: 2rem; 
    position: relative; 
}
.stats-title {
    font-size: 2rem;
    font-weight: 600;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
}
.stats-subtitle { color: #666; margin-top: 0.5rem; }
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}
.stat-card {
    background-color: #fff;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    text-align: center;
    transition: transform 0.2s;
}
.stat-card:hover { transform: translateY(-5px); }
.stat-icon i { font-size: 2rem; color: #4CAF50; margin-bottom: 0.5rem; }
.stat-value { font-size: 1.8rem; font-weight: 700; margin-bottom: 0.3rem; }
.stat-label { font-size: 0.9rem; color: #777; }

.charts-section { margin-top: 2rem; }
.section-title { font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; text-align: center; }
.chart-container {
    background: #fff;
    padding: 1.5rem;
    border-radius: 12px;
    margin-bottom: 2rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}
.chart-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; }
.chart-title { font-size: 1.2rem; font-weight: 600; }
.period-btn {
    background: #eee;
    border: none;
    padding: 0.3rem 0.6rem;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.2s;
}
.period-btn.active, .period-btn:hover {
    background: #4CAF50;
    color: #fff;
}

/* Limiter la hauteur des graphiques pour qu'ils soient moyens */
#barChart, #pieChart {
    max-height: 400px;
}

/* Bouton Retour Dashboard */
.return-btn {
    position: absolute;
    top: 0;
    right: 0;
    background: #4CAF50;
    color: #fff;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: 0.2s;
}
.return-btn:hover { background: #45a049; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="stats-container">
    <header class="stats-header">
        <h1 class="stats-title"><i class="fas fa-chart-line"></i> Tableau de Statistiques</h1>
        <p class="stats-subtitle">Visualisez les données clés et les tendances de votre application en temps réel.</p>
        <a href="<?php echo e(route('dashboard')); ?>" class="return-btn">← Retour au Dashboard</a>
    </header>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
            <div class="stat-value"><?php echo e($totalEvents); ?></div>
            <div class="stat-label">Événements créés</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-users"></i></div>
            <div class="stat-value"><?php echo e($totalParticipants); ?></div>
            <div class="stat-label">Participants actifs</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
            <div class="stat-value"><?php echo e($tauxParticipation); ?>%</div>
            <div class="stat-label">Taux de participation</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-chart-pie"></i></div>
            <?php
                $maxParticipants = $participantsByMonth->max() ?? 1;
                $avgIncrease = $maxParticipants / max($participantsByMonth->count(), 1);
            ?>
            <div class="stat-value"><?php echo e(round($avgIncrease, 1)); ?>x</div>
            <div class="stat-label">Augmentation mensuelle</div>
        </div>
    </div>

    <section class="charts-section">
        <h2 class="section-title">Analytiques des Événements</h2>

        <!-- Bar Chart -->
        <div class="chart-container">
            <div class="chart-header">
                <h3 class="chart-title">Participation par Mois</h3>
            </div>
            <canvas id="barChart"></canvas>
        </div>

        <!-- Pie Chart -->
        <div class="chart-container">
            <div class="chart-header">
                <h3 class="chart-title">Répartition par Type d'Événement</h3>
            </div>
            <canvas id="pieChart"></canvas>
        </div>
    </section>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // --- Bar Chart ---
    const barCtx = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(range(1,12)); ?>.map(m => new Date(0, m-1).toLocaleString('fr-FR', { month: 'short' })),
            datasets: [{
                label: 'Participants',
                data: <?php echo json_encode($participantsByMonth->values()); ?>,
                backgroundColor: '#4CAF50'
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // --- Pie Chart ---
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($eventsByType->keys()); ?>,
            datasets: [{
                data: <?php echo json_encode($eventsByType->values()); ?>,
                backgroundColor: ['#4CAF50','#2196F3','#FFC107','#FF5722','#9C27B0','#00BCD4']
            }]
        },
        options: { responsive: true }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\projet-stage\resources\views/statistiques/index.blade.php ENDPATH**/ ?>