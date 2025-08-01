@extends('template.app')

@section('title', 'Statistiques')

@section('styles')
<style>
    :root {
        --primary: #00695c;
        --primary-dark: #004d40;
        --primary-light: #b2dfdb;
        --accent: #ff8f00;
        --accent-dark: #ff6f00;
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

    @keyframes grow {
        from { transform: scaleY(0); }
        to { transform: scaleY(1); }
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .stats-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1.5rem;
        animation: fadeIn 0.6s ease-out;
    }

    .stats-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .stats-title {
        font-size: 3rem;
        font-weight: 800;
        color: var(--primary-dark);
        margin-bottom: 1rem;
        position: relative;
        display: inline-block;
    }

    .stats-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 5px;
        background: var(--gradient-accent);
        border-radius: 3px;
    }

    .stats-subtitle {
        color: #607d8b;
        font-size: 1.2rem;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: var(--shadow-sm);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(0, 121, 107, 0.1);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--gradient-primary);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 0;
    }

    .stat-card:hover::before {
        opacity: 0.05;
    }

    .stat-icon {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }

    .stat-card:hover .stat-icon {
        animation: float 2s ease-in-out infinite;
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
        line-height: 1;
    }

    .stat-label {
        color: #607d8b;
        font-size: 1rem;
        font-weight: 600;
    }

    /* Charts section */
    .charts-section {
        margin-top: 4rem;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 2rem;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 50px;
        height: 3px;
        background: var(--gradient-accent);
        border-radius: 3px;
    }

    .chart-container {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: var(--shadow-sm);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .chart-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--primary-dark);
    }

    .chart-period {
        display: flex;
        gap: 0.5rem;
    }

    .period-btn {
        background: var(--primary-light);
        color: var(--primary-dark);
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .period-btn.active {
        background: var(--primary);
        color: white;
    }

    .period-btn:hover {
        background: var(--primary);
        color: white;
    }

    /* Bar chart animation */
    .bar-chart {
        display: flex;
        height: 300px;
        align-items: flex-end;
        gap: 1.5rem;
        padding-top: 2rem;
    }

    .bar-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
    }

    .bar {
        width: 100%;
        background: var(--gradient-primary);
        border-radius: 8px 8px 0 0;
        animation: grow 1s ease-out forwards;
        transform-origin: bottom;
        position: relative;
        transition: height 0.5s ease;
    }

    .bar::after {
        content: attr(data-value);
        position: absolute;
        top: -30px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--primary-dark);
        color: white;
        padding: 0.3rem 0.6rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .bar:hover::after {
        opacity: 1;
    }

    .bar-label {
        margin-top: 0.8rem;
        font-size: 0.9rem;
        color: var(--text-dark);
        font-weight: 500;
        text-align: center;
    }

    /* Pie chart */
    .pie-chart-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 300px;
        position: relative;
    }

    .pie-chart {
        width: 250px;
        height: 250px;
        border-radius: 50%;
        background: conic-gradient(
            #4CAF50 0% 30%,
            #2196F3 30% 55%,
            #FFC107 55% 75%,
            #FF5722 75% 100%
        );
        position: relative;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .pie-chart::before {
        content: '';
        position: absolute;
        width: 70%;
        height: 70%;
        background: white;
        border-radius: 50%;
        top: 15%;
        left: 15%;
    }

    .pie-legend {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        justify-content: center;
        margin-top: 2rem;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .legend-color {
        width: 15px;
        height: 15px;
        border-radius: 3px;
    }

    .legend-label {
        font-size: 0.9rem;
        color: var(--text-dark);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .bar-chart {
            height: 250px;
        }
    }

    @media (max-width: 768px) {
        .stats-title {
            font-size: 2.2rem;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .stat-card {
            padding: 1.5rem;
        }
        
        .stat-value {
            font-size: 2rem;
        }
        
        .chart-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .chart-period {
            align-self: flex-end;
        }
    }

    @media (max-width: 576px) {
        .stats-title {
            font-size: 1.8rem;
        }
        
        .stats-subtitle {
            font-size: 1rem;
        }
        
        .bar-chart {
            flex-direction: column;
            height: auto;
            align-items: stretch;
            gap: 1rem;
        }
        
        .bar-container {
            flex-direction: row;
            align-items: center;
            gap: 1rem;
            height: auto;
        }
        
        .bar {
            width: auto;
            height: 30px;
            border-radius: 0 8px 8px 0;
        }
        
        .bar-label {
            margin-top: 0;
            min-width: 80px;
            text-align: left;
        }
        
        .bar::after {
            top: 50%;
            left: auto;
            right: -10px;
            transform: translate(100%, -50%);
        }
    }
</style>
@endsection

@section('content')
<div class="stats-container">
    <header class="stats-header">
        <h1 class="stats-title">
            <i class="fas fa-chart-line"></i> Tableau de Statistiques
        </h1>
        <p class="stats-subtitle">
            Visualisez les données clés et les tendances de votre application en temps réel.
            Analysez les performances et prenez des décisions éclairées.
        </p>
    </header>

    <div class="stats-grid">
        <!-- Card 1 -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-value">128</div>
            <div class="stat-label">Événements créés</div>
        </div>

        <!-- Card 2 -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">542</div>
            <div class="stat-label">Participants actifs</div>
        </div>

        <!-- Card 3 -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value">87%</div>
            <div class="stat-label">Taux de participation</div>
        </div>

        <!-- Card 4 -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-chart-pie"></i>
            </div>
            <div class="stat-value">3.2x</div>
            <div class="stat-label">Augmentation mensuelle</div>
        </div>
    </div>

    <!-- Charts Section -->
    <section class="charts-section">
        <h2 class="section-title">Analytiques des Événements</h2>

        <!-- Bar Chart -->
        <div class="chart-container">
            <div class="chart-header">
                <h3 class="chart-title">Participation par Mois</h3>
                <div class="chart-period">
                    <button class="period-btn active">2023</button>
                    <button class="period-btn">2022</button>
                    <button class="period-btn">2021</button>
                </div>
            </div>
            <div class="bar-chart">
                <div class="bar-container">
                    <div class="bar" style="height: 20%;" data-value="45"></div>
                    <div class="bar-label">Jan</div>
                </div>
                <div class="bar-container">
                    <div class="bar" style="height: 35%;" data-value="78"></div>
                    <div class="bar-label">Fév</div>
                </div>
                <div class="bar-container">
                    <div class="bar" style="height: 50%;" data-value="112"></div>
                    <div class="bar-label">Mar</div>
                </div>
                <div class="bar-container">
                    <div class="bar" style="height: 65%;" data-value="145"></div>
                    <div class="bar-label">Avr</div>
                </div>
                <div class="bar-container">
                    <div class="bar" style="height: 80%;" data-value="178"></div>
                    <div class="bar-label">Mai</div>
                </div>
                <div class="bar-container">
                    <div class="bar" style="height: 100%;" data-value="224"></div>
                    <div class="bar-label">Jun</div>
                </div>
                <div class="bar-container">
                    <div class="bar" style="height: 85%;" data-value="189"></div>
                    <div class="bar-label">Jul</div>
                </div>
                <div class="bar-container">
                    <div class="bar" style="height: 70%;" data-value="156"></div>
                    <div class="bar-label">Aoû</div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="chart-container">
            <div class="chart-header">
                <h3 class="chart-title">Répartition par Type d'Événement</h3>
            </div>
            <div class="pie-chart-container">
                <div class="pie-chart"></div>
            </div>
            <div class="pie-legend">
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #4CAF50;"></div>
                    <span class="legend-label">Formations (30%)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #2196F3;"></div>
                    <span class="legend-label">Conférences (25%)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #FFC107;"></div>
                    <span class="legend-label">Ateliers (20%)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #FF5722;"></div>
                    <span class="legend-label">Autres (25%)</span>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Script for animations -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate bars with different delays
        const bars = document.querySelectorAll('.bar');
        bars.forEach((bar, index) => {
            bar.style.animationDelay = `${index * 0.1}s`;
        });
        
        // Period button functionality
        const periodBtns = document.querySelectorAll('.period-btn');
        periodBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                periodBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                // Here you would typically fetch new data for the selected period
            });
        });
    });
</script>
@endsection