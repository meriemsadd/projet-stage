<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des événements</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th {
            background-color: #f0f0f0;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Liste des événements</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evenements as $event)
                <tr>
                    <td>{{ $event->nom }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->lieu }}</td>
                    <td>{{ $event->type_event->nom ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
