<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>S'inscrire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    {{-- Barre de navigation --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="#">Site Officiel de la Wilaya OUJDA ORIENTAL</a>
        
        {{-- Bouton retour Accueil --}}
        <div class="ms-auto">
            <a href="{{ route('acceuil') }}" class="btn btn-outline-secondary">← Accueil</a>
        </div>
    </nav>
    </nav> 

    <div class="container mt-5" style="max-width: 500px;">
        <h2 class="mb-4 text-center">Inscription</h2>

        {{-- Affichage des erreurs --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire de connexion --}}
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required autofocus>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail électronique</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus>
            </div>

            <div class="mb-3" class="form-group">
               <label for="service_id">Service</label>
               <select name="service_id" id="service_id" required>
              <option value="">-- Choisir un service --</option>
             @foreach($services as $service)
              <option value="{{ $service->id }}">{{ $service->nom }}</option>
            @endforeach
               </select>
            </div>


            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

             <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>

            <p class="mt-3 text-center">
                <i>Vous avez déja un compte ?</i><br>
                <a href="/login">Se connecter</a>
            </p>
        </form>
    </div>
</body>
</html>
