<?php $__env->startSection('title', 'Paramètres'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    :root {
        --primary-color: #00695c;
        --primary-dark: #004d40;
        --accent-color: #ff8f00;
        --text-dark: #263238;
        --text-light: #eceff1;
        --border-color: #e0e0e0;
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.1);
        --card-bg: #ffffff;
    }

    .settings-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 0 20px;
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .settings-header {
        display: flex;
        align-items: center;
        margin-bottom: 40px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--primary-light);
    }

    .settings-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin: 0;
        display: flex;
        align-items: center;
    }

    .settings-title i {
        margin-right: 15px;
        color: var(--accent-color);
    }

    .settings-card {
        background: var(--card-bg);
        border-radius: 12px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 30px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(0, 121, 107, 0.1);
    }

    .settings-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 121, 107, 0.15);
    }

    .card-header {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 18px 25px;
        font-size: 1.2rem;
        font-weight: 600;
        display: flex;
        align-items: center;
    }

    .card-header i {
        margin-right: 12px;
        font-size: 1.1rem;
    }

    .card-body {
        padding: 25px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--primary-dark);
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #f9f9f9;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 121, 107, 0.1);
        background-color: white;
    }

    .form-control:disabled {
        background-color: #f0f0f0;
        color: #666;
        cursor: not-allowed;
    }

    .btn-save {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        box-shadow: 0 4px 10px rgba(0, 121, 107, 0.2);
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 121, 107, 0.3);
    }

    .btn-save i {
        margin-right: 8px;
    }

    .settings-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    /* Toggle switch amélioré */
    .switch-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 24px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    input:checked + .slider {
        background: linear-gradient(135deg, var(--accent-color), #ff6f00);
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }

    /* Section notifications */
    .notification-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .notification-text {
        flex: 1;
        padding-right: 15px;
    }

    .notification-text strong {
        display: block;
        margin-bottom: 3px;
        color: var(--primary-dark);
    }

    .notification-text p {
        margin: 0;
        color: #666;
        font-size: 0.9rem;
    }

    /* Tooltip pour le nom de l'application */
    .disabled-tooltip {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .disabled-tooltip .tooltip-text {
        visibility: hidden;
        width: 200px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        transform: translateX(-50%);
        opacity: 0;
        transition: opacity 0.3s;
        font-size: 0.85rem;
    }

    .disabled-tooltip:hover .tooltip-text {
        visibility: visible;
        opacity: 1;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .settings-title {
            font-size: 1.8rem;
        }
        
        .settings-grid {
            grid-template-columns: 1fr;
        }
        
        .card-header {
            padding: 15px 20px;
        }
    }

    @media (max-width: 576px) {
        .settings-title {
            font-size: 1.6rem;
        }
        
        .card-body {
            padding: 20px;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="settings-container">
    <div class="settings-header">
        <h1 class="settings-title">
            <i class="fas fa-cog"></i>Paramètres
        </h1>
    </div>

    <div class="settings-grid">
        <!-- Paramètres généraux -->
        <div class="settings-card">
            <div class="card-header">
                <i class="fas fa-sliders-h"></i>Paramètres généraux
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label class="form-label">Nom de l'application</label>
                        <div class="disabled-tooltip">
                            <input type="text" class="form-control" value="Wilaya Oujda-Angad" disabled>
                            <span class="tooltip-text">Le nom de l'application ne peut pas être modifié</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Fuseau horaire</label>
                        <select class="form-control">
                            <option>Afrique/Casablanca (UTC+1)</option>
                            <option>Europe/Paris (UTC+1)</option>
                            <option>UTC</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Langue</label>
                        <select class="form-control">
                            <option>Français</option>
                            <option>Arabe</option>
                            <option>Anglais</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save"></i>Enregistrer les modifications
                    </button>
                </form>
            </div>
        </div>

        <!-- Paramètres de notification -->
        <div class="settings-card">
            <div class="card-header">
                <i class="fas fa-bell"></i>Notifications
            </div>
            <div class="card-body">
                <div class="notification-item">
                    <div class="notification-text">
                        <strong>Notifications par email</strong>
                        <p>Recevoir des notifications importantes par email</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
                
                <div class="notification-item">
                    <div class="notification-text">
                        <strong>Rappels d'événements</strong>
                        <p>Recevoir des rappels pour les événements à venir</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
                
                <div class="notification-item">
                    <div class="notification-text">
                        <strong>Mises à jour système</strong>
                        <p>Être informé des mises à jour importantes</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Paramètres avancés -->
    <div class="settings-card">
        <div class="card-header">
            <i class="fas fa-user-shield"></i>Sécurité
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label class="form-label">Changer le mot de passe</label>
                    <input type="password" class="form-control" placeholder="Nouveau mot de passe">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" placeholder="Confirmer le mot de passe">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Authentification à deux facteurs</label>
                    <div class="switch-container">
                        <span>Activer la vérification en deux étapes</span>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
                
                <button type="submit" class="btn-save">
                    <i class="fas fa-lock"></i>Mettre à jour la sécurité
                </button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\projet-stage\resources\views/parametres.blade.php ENDPATH**/ ?>