<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'événement - {{ $evenement->titre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-light bg-light px-4">
    <a class="navbar-brand" href="{{ url('/evenements') }}">← Retour</a>
</nav>

<div class="container mt-4">
    <h1>{{ $evenement->titre }}</h1>

    <p><strong>Lieu :</strong> {{ $evenement->lieu }}</p>
    <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($evenement->date)->format('d/m/Y') }}</p>
    <p><strong>Heure :</strong> {{ \Carbon\Carbon::parse($evenement->heure)->format('H:i') }}</p>
    <p><strong>Description :</strong> {{ $evenement->description }}</p>
    <p><strong>Type :</strong> {{ $evenement->type->nom ?? 'N/A' }}</p>
<table border="1" cellpadding="8" cellspacing="0">
    <thead><!--titre des coolonnes=entete du tableau-->
      <tr><!--ligne(tr=row)-->
       <th>Nom</th><!--cellule titre-->
       <th>Prenom</th>
       <th>Email</th>
       <th>Profession</th>
       <th>Evenement</th>
       <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($participants as $p)
      <tr><!--pour chaque particip commence nouvelle ligne-->
        <td>{{$p->nom}}</td>
        <td>{{$p->prenom}}</td>
        <td>{{$p->email}}</td>
        <td>{{$p->profession}}</td>
        <td>{{$p->titre}}</td>
        <td>
          <!--bouton Modifier-->
          <a href="{{route('participants.edit',$p->id)}}">Modifier</a><!--Lien pour modifier ce participant (va à edit)--> |
           <!-- Bouton Supprimer -->
          <form action="{{route('participants.destroy',$p->id)}}"method="POST" style="display:inline-block;">
            @csrf<!--Protection contre les attaques CSRF-->
            @method('DELETE')
            <button type="submit" onclick="return confirm('confirmer la suppression ?')" class="btn btn-danger btn-sm">
              Supprimer</button>
            <!--tous ce qui est dans form action pour supprimer le particpant(button)-->
          </form>
        </td>  
      </tr>
    @endforeach
  </tbody>
</table>