<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Accueil - Wilaya Oujda Oriental</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #ffffff);
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

        /* Cartes */
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

        /* Image et badge */
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
            <a class="navbar-brand" href="#">
              <img src="{{ asset('images/R.png') }}" alt="Logo" style="height: 60px; width: auto;" />
                 Wilaya Oujda Oriental
            </a>
 

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


    
</a></li>
                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('login') }}" class="btn btn-outline-light px-4">Se connecter</a>
                    </li>
                </ul>

            <div class="collapse navbar-collapse" id="navMenu">
                <form class="d-flex w-100 gap-3" action="{{ route('evenements.index') }}" method="GET">
    <!-- Barre de recherche -->
    <input class="form-control me-2" type="search" placeholder="Rechercher un événement..." name="q" value="{{ request('q') }}" />

    <!-- Filtre par type d'événement -->
    <select name="type" class="form-select w-auto">
        <option value="">Tous les types</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                {{ $type->nom }}
            </option>
        @endforeach
    </select>

    <button class="btn btn-outline-light" type="submit">🔎</button>
</form>


            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="container-main">
        <h1 class="section-title">Listes des événements</h1>

        <div class="row g-4 justify-content-center">
            @forelse ($evenements as $event)
                <div class="col-sm-6 col-md-4 col-lg-3 d-flex">
                    <div class="card event-card position-relative w-100">
                        <div class="position-relative">
                            <img src="{{ $event->image_url ?? 'https://via.placeholder.com/400x180?text=Événement' }}" alt="Image de l'événement" class="event-image w-100" />
                            <span class="badge badge-position 
                                @if($event->status == 'À venir') badge-avenir
                                @elseif($event->status == 'En cours') badge-encours
                                @else badge-passe @endif">
                                {{ $event->status }}
                            </span>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $event->titre }}</h5>
                            <p class="card-text">
                                📍 {{ $event->lieu }} <br />
                                🕓 {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($event->heure)->format('H:i') }}
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
