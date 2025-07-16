<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Se connecter</title>
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

    <div class="container mt-5" style="max-width: 500px;">
        <h2 class="mb-4 text-center">Connexion</h2>

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

        {{-- Formulaire de réinitialisation du mot de passe --}}
        <form action="{{ route('loginReset') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="login" class="form-label">Nom d'utilisateur ou E-mail</label>
                <input type="text" class="form-control" id="login" name="login" required autofocus>
            </div>

            <div class="mb-3">
                <label for="newpassword" class="form-label">Nouveau mot de passe</label>
                <input type="password" class="form-control" id="newpassword" name="password" required>
            </div>

            <div class="mb-3">
               <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
               <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Confirmer le nouveau mot de passe</button>
            </div>

            <p class="mt-3 text-center">
                <i>Vous avez un compte ?</i><br>
                <a href="/login">Se connecter</a>
            </p>
        </form>
    </div>
</body>
</html>
