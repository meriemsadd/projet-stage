<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield("title", "Wilaya De L'Oriental")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #00796b;
            --primary-dark: #004d40;
            --primary-light: #b2dfdb;
            --accent-color: #ff9800;
            --text-dark: #263238;
            --text-light: #eceff1;
            --gradient-primary: linear-gradient(135deg, #00796b, #004d40);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #ffffff);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--text-dark);
        }

        /* Navbar Styles */
        .navbar {
            background-color: var(--primary-dark);
            padding: 0.75rem 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 77, 64, 0.3);
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

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Search Form */
        .search-form {
            display: flex;
            gap: 1rem;
            width: 100%;
            align-items: center;
        }

        .search-form .form-control {
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
        }

        .search-form .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-form .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 0 0.25rem rgba(0, 121, 107, 0.25);
            color: white;
            border-color: white;
        }

        .search-form .form-select {
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='white' d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
        }

        .search-form .btn-outline-light {
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
        }

        .search-form .btn-outline-light:hover {
            background-color: white;
            color: var(--primary-dark);
            transform: scale(1.1);
        }

        /* Main Content */
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
            color: var(--primary-dark);
            position: relative;
            padding-bottom: 1rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        /* Event Cards */
        .event-card {
            border-radius: 20px;
            overflow: hidden;
            background: white;
            display: flex;
            flex-direction: column;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .event-image {
            height: 200px;
            width: 100%;
            object-fit: cover;
            position: relative;
            transition: transform 0.5s ease;
        }

        .event-card:hover .event-image {
            transform: scale(1.05);
        }

        .badge-position {
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

        .badge-avenir { background-color: #4caf50; }
        .badge-encours { background-color: var(--accent-color); }
        .badge-passe { background-color: #f44336; }

        .card-body {
            flex-grow: 1;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.8rem;
        }

        .card-text {
            color: #546e7a;
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
            flex-grow: 1;
            line-height: 1.6;
        }

        .btn-details {
            align-self: flex-start;
            background: var(--gradient-primary);
            border: none;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 121, 107, 0.3);
        }

        .btn-details:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 121, 107, 0.4);
            background: linear-gradient(135deg, #00695c, #003d33);
        }

        /* Footer */
        footer.footer {
            background-color: var(--primary-dark);
            color: var(--text-light);
            text-align: center;
            padding: 2rem 1rem;
            font-weight: 500;
            margin-top: auto;
            position: relative;
        }

        footer.footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-primary);
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
        }

        .footer-link:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }

        /* About Section */
        .about-section {
            max-width: 800px;
            margin: 4rem auto 3rem auto;
            color: var(--primary-dark);
            font-size: 1.05rem;
            text-align: center;
            padding: 0 1rem;
            line-height: 1.8;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .search-form {
                flex-direction: column;
                gap: 1rem;
            }
            
            .search-form .form-control,
            .search-form .form-select {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }
            
            .navbar-brand img {
                height: 50px;
            }
            
            .event-image {
                height: 180px;
            }
        }

        @media (max-width: 576px) {
            .section-title {
                font-size: 1.8rem;
            }
            
            .navbar-brand {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .navbar-brand img {
                height: 40px;
                margin-bottom: 0.5rem;
            }
            
            .footer-links {
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="{{ route('acceuil') }}">
                <img src="{{ asset('images/R.png') }}" alt="Logo" />
                <span class="navbar-brand-text">
                    Wilaya de la Région de l'Oriental<br>Préfecture Oujda Angad
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @unless(Request::is('evenements/create'))
            <div class="collapse navbar-collapse" id="navMenu">
                <form class="search-form" action="{{ route('evenements.index') }}" method="GET">
                    <input class="form-control" type="search" placeholder="Rechercher un événement..." name="q" value="{{ request('q') }}" />
                    <select name="type" class="form-select">
                        <option value="">Tous les types</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            @endunless
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container-main">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-links">
            <a href="#" class="footer-link">Mentions légales</a>
            <a href="#" class="footer-link">Politique de confidentialité</a>
        </div>
        <div>
            &copy; {{ now()->year }} Wilaya Oujda-Angad. Tous droits réservés.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>