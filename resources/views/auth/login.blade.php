@extends('template.app')

@section('title', 'Se connecter')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Connexion</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="login" class="form-label">Nom d'utilisateur ou E-mail</label>
            <input type="text" class="form-control" id="login" name="login" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>

        <p class="mt-3 text-center">
            <i>Vous avez oublié votre mot de passe ?</i><br>
            <a href="{{ route('loginReset') }}">Réinitialiser mot de passe</a>
        </p>
    </form>
</div>
@endsection
