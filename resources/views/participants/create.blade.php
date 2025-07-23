@extends('template.app')

@section('title', 'Inscription des participants')

@section('content')
<body>
    <h1>Formulaire d'inscription</h1>

    {{-- Affichage des erreurs --}}
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire -->
    <form action="{{ route('participants.store') }}" method="POST">
        @csrf

        <label>Nom :</label>
        <input type="text" name="nom" value="{{ old('nom') }}" required><br>

        <label>Prénom :</label>
        <input type="text" name="prenom" value="{{ old('prenom') }}" required><br>

        <label>Email :</label>
        <input type="email" name="email" value="{{ old('email') }}" required><br>

        <label>Profession :</label>
        <input type="text" name="profession" value="{{ old('profession') }}"><br>

        {{-- Organisme vient juste après --}}
        <label>Organisme (facultatif) :</label>
        <select name="organisme_id">
            <option value="">-- Aucun / Non spécifié --</option>
            @foreach($organismes as $organisme)
                <option value="{{ $organisme->id }}" {{ old('organisme_id') == $organisme->id ? 'selected' : '' }}>
                    {{ $organisme->nom }}
                </option>
            @endforeach
        </select><br>
        <!-- Zone de signature -->
    <div class="mb-3">
        <label for="signature" class="form-label">Signature :</label>
        <br>
        <canvas id="signature-pad" width="400" height="200" style="border: 1px solid #000;"></canvas>
        <input type="hidden" name="signature" id="signature">
        <button type="button" onclick="clearSignature()">Effacer</button>
        </div>


        {{-- ID caché de l'événement --}}
        <input type="hidden" name="evenement_id" value="{{ $evenement_id }}">

        <button type="submit">✅ Enregistrer</button>
    </form>
<script>
    const canvas = document.getElementById('signature-pad');
    const signatureInput = document.getElementById('signature');
    const ctx = canvas.getContext('2d');
    let drawing = false;

    let lastX = 0;
let lastY = 0;

canvas.addEventListener('mousedown', function (e) {
    drawing = true;
    const rect = canvas.getBoundingClientRect();
    lastX = e.clientX - rect.left;
    lastY = e.clientY - rect.top;
});

canvas.addEventListener('mouseup', () => drawing = false);
canvas.addEventListener('mouseleave', () => drawing = false);

canvas.addEventListener('mousemove', function (e) {
    if (!drawing) return;
    const rect = canvas.getBoundingClientRect();
    const currentX = e.clientX - rect.left;
    const currentY = e.clientY - rect.top;

    ctx.lineWidth = 2;
    ctx.lineCap = 'round';
    ctx.strokeStyle = '#000';
    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(currentX, currentY);
    ctx.stroke();

    lastX = currentX;
    lastY = currentY;
});

    function clearSignature() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        signatureInput.value = '';
    }

    // Lors de la soumission du formulaire : convertir le dessin en image
    document.querySelector('form').addEventListener('submit', function () {
        signatureInput.value = canvas.toDataURL();
    });
</script>
</body>
@endsection
