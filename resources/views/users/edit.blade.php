@extends('template.app')

@section('title', 'Modifier un utilisateur')

@section('content')
<style>
    .container {
        max-width: 600px;
        background: white;
        padding: 2rem 2.5rem;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(0, 77, 64, 0.15);
        margin: 2rem auto 5rem;
        font-family: 'Raleway', sans-serif;
    }
    h2 {
        color: #004d40;
        font-weight: 700;
        text-align: center;
        margin-bottom: 1.8rem;
        font-size: 2rem;
    }
    label {
        font-weight: 600;
        color: #00695c;
    }
    input.form-control, select.form-select {
        border: 2px solid #a5d6a7;
        border-radius: 12px;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        margin-bottom: 1rem;
    }
    button.btn-success {
        background: linear-gradient(135deg, #4caf50, #087f23);
        border: none;
        padding: 0.55rem 2.4rem;
        font-weight: 700;
        font-size: 1.1rem;
        border-radius: 30px;
        cursor: pointer;
    }
    button.btn-success:hover {
        background: linear-gradient(135deg, #087f23, #4caf50);
        transform: translateY(-4px);
    }
    a.btn-secondary {
        padding: 0.55rem 2.4rem;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 30px;
        background-color: #9e9e9e;
        color: white !important;
        text-decoration: none;
        margin-left: 1rem;
    }
    a.btn-secondary:hover {
        background-color: #6e6e6e;
    }
</style>

<div class="container">
    <h2>Modifier l'utilisateur</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>

        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>

        <label for="password">Mot de passe (laisser vide pour ne pas changer)</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Nouveau mot de passe">

        <label for="service_id">Service (optionnel)</label>
        <select name="service_id" id="service_id" class="form-select">
            <option value="">-- Choisir un service --</option>
            @foreach ($services as $service)
                <option value="{{ $service->id }}" {{ (old('service_id', $user->service_id) == $service->id) ? 'selected' : '' }}>
                    {{ $service->nom }}
                </option>
            @endforeach
        </select>

        <div style="text-align:center; margin-top: 2rem;">
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
