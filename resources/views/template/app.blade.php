<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Wilaya Oujda Oriental')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Style global -->
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
            height: 38px;
            width: 38px;
        }
        .nav-link {
            color: #c8e6c9 !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-link:hover,
        .nav-link:focus {
            color: #a5d6a7 !important;
        }
        .btn-outline-light {
            color: white !important;
            font-weight: 600;
            border-color: white !important;
        }
        .btn-outline-light:hover {
            background-color: white !important;
            color: #00796b !important;
        }

        .footer {
            background-color: #004d40;
            color: #e0f2f1;
            text-align: center;
            padding: 1.8rem 1rem;
            font-weight: 500;
            font-size: 0.95rem;
            margin-top: auto;
        }

        @media (max-width: 767px) {
            .section-title {
                font-size: 2rem;
            }
        }
    </style>

    @yield('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/R.png') }}" alt="Logo" style="height: 60px; width: auto;" />
                Wilaya Oujda Oriental
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    @guest
                    @if (Route::currentRouteName() !== 'login')
                    <li class="nav-item ms-lg-3">
                    <a href="{{ route('login') }}" class="btn btn-outline-light px-4">Se connecter</a>
                   </li>
                   @endif
                   @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="container-main flex-grow-1 py-4 px-3">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        &copy; {{ now()->year }} Wilaya Oujda-Angad. Tous droits réservés. &nbsp;&nbsp; | &nbsp;&nbsp; 
        <a href="#" class="text-light text-decoration-none">Mentions légales</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
        <a href="#" class="text-light text-decoration-none">Politique de confidentialité</a>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')

</body>
</html>
