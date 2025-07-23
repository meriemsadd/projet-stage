@extends('template.app')

@section('title', 'Réinitialiser le mot de passe')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Réinitialisation du mot de passe</h2>

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

    {{-- Formulaire de réinitialisation --}}
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
            <i>Vous avez déjà un compte ?</i><br>
            <a href="{{ route('login') }}">Se connecter</a>
        </p>
    </form>
</div>
@endsection
