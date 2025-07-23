<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des événements</title>
    <style>
        table {
            width: 100%; border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000; padding: 6px; text-align: left;
        }
    </style>
</head>
<body>
    <h2>Liste des événements</h2>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Lieu</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>Heure</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evenements as $e)
            <tr>
                <td>{{ $e->titre }}</td>
                <td>{{ $e->lieu }}</td>
                <td>{{ $e->date_de_début }}</td>
                <td>{{ $e->date_de_fin }}</td>
                <td>{{ $e->heure }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
