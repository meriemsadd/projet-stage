<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield("title", "Wilaya De L'Oriental")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    @yield('styles')
    <style>
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
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f5f7fa;
        }

        /* Navbar Styles */
        .navbar {
            background-color: var(--primary-dark);
            padding: 0.75rem 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 77, 64, 0.3);
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: translateX(5px);
        }

        .navbar-brand img {
            height: 60px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: rotate(-5deg);
        }

        .navbar-brand-text {
            font-size: 0.85rem;
            font-weight: 500;
            line-height: 1.2;
        }

        .btn-login, .btn-logout {
            color: white !important;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            padding: 0.5rem 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            background: var(--gradient-accent);
            border: none;
            display: inline-flex;
            align-items: center;
        }

        .btn-login:hover, .btn-logout:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 152, 0, 0.3);
        }

        .btn-login::before, .btn-logout::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn-login:hover::before, .btn-logout:hover::before {
            left: 100%;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Main Content Container */
        .container-main {
            flex-grow: 1;
            padding: 0;
            max-width: 100%;
            margin: 0;
        }

        /* Footer Styles */
        footer.footer {
            background-color: var(--primary-dark);
            color: var(--text-light);
            text-align: center;
            padding: 2rem 1rem;
            font-weight: 500;
            font-size: 0.95rem;
            margin-top: auto;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-accent);
        }

        .footer-links {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .footer-link {
            color: var(--text-light);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .footer-link:hover {
            color: var(--accent-color);
            transform: translateY(-2px);
        }

        .footer-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background-color: var(--accent-color);
            transition: width 0.3s ease;
        }

        .footer-link:hover::after {
            width: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .navbar-brand img {
                height: 50px;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0.75rem 1rem;
            }
            
            .navbar-brand-text {
                font-size: 0.75rem;
            }
            
            .footer-links {
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .navbar-brand img {
                height: 40px;
                margin-bottom: 0.25rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="{{ route('acceuil') }}">
                <img src="{{ asset('images/R.png') }}" alt="Logo Wilaya Oujda" />
                <span class="navbar-brand-text">
                    Wilaya de la Région de l'Oriental<br>Préfecture Oujda Angad
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    @if(request()->is('/'))
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-login ms-lg-3 mt-2 mt-lg-0">
                                <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                            </a>
                        </li>
                    @endif

                    {{-- Bouton déconnexion uniquement sur dashboard --}}
                    @auth
                        @if(request()->routeIs('dashboard'))
                            <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-logout">
                                        <i class="fas fa-sign-out-alt me-2"></i>Se déconnecter
                                    </button>
                                </form>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container-main">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-links">
                <a href="#" class="footer-link">Mentions légales</a>
                <a href="#" class="footer-link">Politique de confidentialité</a>
                <a href="#" class="footer-link">Plan du site</a>
                <a href="#" class="footer-link">Contact</a>
                <a href="#" class="footer-link">Accessibilité</a>
            </div>
            <div class="mt-3">
                &copy; {{ now()->year }} Wilaya Oujda-Angad. Tous droits réservés.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
