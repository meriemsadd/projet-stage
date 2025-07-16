<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des participants</title>
</head>
<body>
  @if(isset($evenement))
  <h1>Participants pour l'événement : {{ $evenement->titre }}</h1>
@else
  <h1>Participants enregistrés</h1>
@endif
 @if(isset($evenement))
    <a href="{{ route('participants.create', ['evenementId' => $evenement->id]) }}">
        <button type="button">Nouveau Participant</button>
    </a>
@endif

  <table border="1" cellpadding="8" cellspacing="0">
    <thead><!--titre des coolonnes=entete du tableau-->
      <tr><!--ligne(tr=row)-->
       <th>Nom</th><!--cellule titre-->
       <th>Prenom</th>
       <th>Email</th>
       <th>Profession</th>
       @if(!isset($evenement))
        <th>Evenement</th>
       @endif

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
        @if(!isset($evenement))
         <td>{{ $p->evenement?->titre ?? 'Non défini' }}</td>
        @endif

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



  
</body>
</html>