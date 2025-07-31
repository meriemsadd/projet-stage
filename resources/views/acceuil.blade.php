<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Accueil - Wilaya De L'Oriental</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            /* Mis à jour avec le style radial-gradient et perspective 3D */
            background: radial-gradient(circle at top left, #e0f7fa, #ffffff);
            perspective: 1000px;

            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar principale */
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

        /* Container principal */
        .container-main {
            flex-grow: 1;
            padding: 3rem 1rem 5rem 1rem;
            max-width: 1200px;
            margin: auto;
        }

        /* Titre principal */
        .section-title {
            text-align: center;
            margin-bottom: 2.5rem;
            font-size: 2.5rem;
            font-weight: 700;
            color: #004d40;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        }

        /* Cartes avec effets 3D, ombre améliorée et animation */
        .event-card {
            border-radius: 20px;
            overflow: hidden;
            background: white;
            display: flex;
            flex-direction: column;
            transform-style: preserve-3d;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;

            /* Animation d'apparition */
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }
        /* Décalage de l’animation pour chaque carte */
        .event-card:nth-child(1) { animation-delay: 0.1s; }
        .event-card:nth-child(2) { animation-delay: 0.2s; }
        .event-card:nth-child(3) { animation-delay: 0.3s; }
        .event-card:nth-child(4) { animation-delay: 0.4s; }
        .event-card:nth-child(5) { animation-delay: 0.5s; }
        /* Ajouter autant que nécessaire */

        .event-card:hover {
            transform: rotateY(5deg) scale(1.03);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        /* Animation clé */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Image et badge */
        .event-image {
            height: 180px;
            width: 100%;
            object-fit: cover;
            position: relative;
            border-bottom: 3px solid #00796b;
        }
        .btn-outline-light {
            white-space: nowrap;
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

        .badge-avenir { background-color: #4caf50; }    /* Vert */
        .badge-encours { background-color: #ff9800; }  /* Orange */
        .badge-passe { background-color: #f44336; }    /* Rouge */

        .card-body {
            flex-grow: 1;
            padding: 1.3rem 1.5rem;
            display: flex;
            flex-direction: column;
        }
        .card-title {
            font-size: 1.4rem;
            font-weight: bold;
            color: #00796b;
            margin-bottom: 0.7rem;
            text-shadow: 1px 1px #d0f0e0;
        }
        .card-text {
            color: #444;
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
            flex-grow: 1;
        }

        .btn-details {
            align-self: flex-start;
            background: linear-gradient(135deg, #26a69a, #004d40);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
            font-weight: 600;
            padding: 0.45rem 1.3rem;
            border-radius: 25px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            color: white;
        }
        .btn-details:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #00796b, #00332e);
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

        /* Section à propos */
        .about-section {
            max-width: 800px;
            margin: 4rem auto 3rem auto;
            color: #004d40;
            font-size: 1.05rem;
            text-align: center;
            padding: 0 1rem;
            line-height: 1.6;
        }

        /* Responsive */
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
        <a class="navbar-brand d-flex flex-column align-items-start" href="{{ route('acceuil') }}">
            <img src="{{ asset('images/R.png') }}" alt="Logo" />
            <span style="font-size: 0.85rem; font-weight: 500;">
                Wilaya de la région de l’Oriental<br>Préfecture Oujda Angad
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
            aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navMenu">
            <div class="ms-auto">
                <a href="{{ route('login') }}" class="btn btn-outline-light px-4">Se connecter</a>
            </div>
        </div>
    </div>
</nav>


    <!-- Contenu principal -->
    <main class="container-main">
        <h1 class="section-title">Listes des événements</h1>
        <div class="container my-4">
    <form class="d-flex flex-wrap gap-3 justify-content-center" action="{{ route('acceuil') }}" method="GET">
        <input class="form-control w-25" type="search" placeholder="Rechercher un événement..." name="search" value="{{ request('search') }}" />
        
        <select name="type" class="form-select w-auto">
            <option value="">Tous les types</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                    {{ $type->nom }}
                </option>
            @endforeach
        </select>

        <button class="btn btn-primary" type="submit">🔎 Rechercher</button>
    </form>
</div>

        <div class="row g-4 justify-content-center">
            @forelse ($evenements as $event)
                <div class="col-sm-6 col-md-4 col-lg-3 d-flex">
                    <div class="card event-card position-relative w-100">
                        <div class="position-relative">
                            <img src="{{ $event->image_url ?? 'https://via.placeholder.com/400x180?text=Événement' }}" alt="Image de l'événement" class="event-image w-100" />
                            <span class="badge badge-position {{ $event->badge }}">
                                 {{ $event->status }}
                            </span>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $event->titre }}</h5>
                            <p class="card-text">
                                📍 {{ $event->lieu }} <br>
                                🕓 Du {{ \Carbon\Carbon::parse($event->date_de_début)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($event->heure)->format('H:i') }}
                                au {{ \Carbon\Carbon::parse($event->date_de_fin)->format('d/m/Y') }}
                            </p>
                            <a href="{{ route('evenements.show', $event->id) }}" class="btn btn-details mt-auto">Voir détails</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center fs-5 text-muted">Aucun événement disponible pour le moment.</p>
            @endforelse
        </div>

        <!-- Section À propos -->
        <section class="about-section">
            <h2>À propos de la Wilaya Oujda Oriental</h2>
            <p>
                La Wilaya Oujda Oriental est une administration publique engagée dans le développement local et
                la gestion efficace des événements culturels, sociaux et économiques. Ce portail vous permet
                de consulter les événements à venir, en cours et passés, et d’y participer facilement.
            </p>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        &copy; {{ now()->year }} Wilaya Oujda-Angad. Tous droits réservés. &nbsp;&nbsp; | &nbsp;&nbsp; 
        <a href="#" class="text-light text-decoration-none">Mentions légales</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
        <a href="#" class="text-light text-decoration-none">Politique de confidentialité</a>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
