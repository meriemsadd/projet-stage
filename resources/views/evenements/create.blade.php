@extends('template.app')

@section('title', 'Créer un événement')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap');

    :root {
        --primary: #00796b;
        --primary-dark: #004d40;
        --primary-light: #b2dfdb;
        --accent: #ff8f00;
        --white: #ffffff;
        --light-bg: #f5f7fa;
        --text: #263238;
        --error: #d32f2f;
        --success: #388e3c;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #e0f7fa, #f5fbfc);
        min-height: 100vh;
        color: var(--text);
    }

    .event-form-container {
        max-width: 750px;
        margin: 3rem auto;
        background: var(--white);
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 77, 64, 0.15);
        overflow: hidden;
        position: relative;
        z-index: 1;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .event-form-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(0, 77, 64, 0.25);
    }

    .form-header {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--white);
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .form-header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
        transform: rotate(30deg);
    }

    .form-title {
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        font-size: 2.2rem;
        margin: 0;
        position: relative;
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .form-body {
        padding: 2.5rem;
    }

    .form-group {
        margin-bottom: 1.8rem;
        position: relative;
    }

    .form-label {
        display: block;
        margin-bottom: 0.6rem;
        font-weight: 600;
        color: var(--primary-dark);
        font-size: 1rem;
    }

    .form-control, .form-select {
        width: 100%;
        padding: 0.8rem 1.2rem;
        border: 2px solid var(--primary-light);
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: rgba(178, 223, 219, 0.1);
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(0, 121, 107, 0.2);
        outline: none;
    }

    .error-message {
        color: var(--error);
        font-size: 0.85rem;
        margin-top: 0.4rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .error-message i {
        font-size: 1rem;
    }

    .alert-danger {
        background-color: rgba(211, 47, 47, 0.1);
        color: var(--error);
        border-left: 4px solid var(--error);
        border-radius: 8px;
        padding: 1.2rem;
        margin-bottom: 2rem;
    }

    .alert-danger ul {
        margin: 0;
        padding-left: 1.5rem;
    }

    .alert-danger li {
        margin-bottom: 0.5rem;
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--white);
        border: none;
        padding: 0.8rem 2.5rem;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 77, 64, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 77, 64, 0.4);
    }

    .btn-cancel {
        background: transparent;
        color: var(--primary);
        border: 2px solid var(--primary);
        padding: 0.8rem 2.5rem;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .btn-cancel:hover {
        background: rgba(0, 121, 107, 0.1);
        transform: translateY(-3px);
        text-decoration: none;
    }

    .form-actions {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        margin-top: 3rem;
    }

    /* Image preview */
    .image-upload-container {
        text-align: center;
        margin: 1.5rem 0;
    }

    #preview-image {
        max-width: 100%;
        max-height: 250px;
        border-radius: 12px;
        margin-top: 1rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        display: none;
        border: 2px dashed var(--primary-light);
        padding: 0.5rem;
    }

    .upload-label {
        display: inline-block;
        padding: 0.8rem 1.8rem;
        background: rgba(178, 223, 219, 0.3);
        color: var(--primary-dark);
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
        border: 2px dashed var(--primary);
    }

    .upload-label:hover {
        background: rgba(178, 223, 219, 0.5);
        transform: translateY(-2px);
    }

    /* Radio buttons */
    .radio-group {
        display: flex;
        gap: 1.5rem;
        margin-top: 0.5rem;
    }

    .radio-option {
        position: relative;
    }

    .radio-option input {
        position: absolute;
        opacity: 0;
    }

    .radio-option label {
        display: inline-block;
        padding: 0.6rem 1.2rem;
        border-radius: 50px;
        background: rgba(178, 223, 219, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .radio-option input:checked + label {
        background: var(--primary);
        color: var(--white);
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .event-form-container {
            margin: 2rem 1.5rem;
            border-radius: 15px;
        }
        
        .form-body {
            padding: 1.8rem;
        }
        
        .form-title {
            font-size: 1.8rem;
        }
        
        .form-actions {
            flex-direction: column;
            gap: 1rem;
        }
        
        .btn-submit, .btn-cancel {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="event-form-container">
    <div class="form-header">
        <h2 class="form-title">
            <i class="fas fa-calendar-plus"></i> Créer un nouvel événement
        </h2>
    </div>


    <div class="form-body">

        a.btn-secondary {
            padding: 0.55rem 2.4rem;
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 30px;
            background-color: #9e9e9e;
            color: white !important;
            transition: background-color 0.3s ease, transform 0.25s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(158, 158, 158, 0.6);
        }
        a.btn-secondary:hover {
            background-color: #6e6e6e;
            transform: translateY(-4px);
            text-decoration: none;
            box-shadow: 0 7px 20px rgba(110, 110, 110, 0.9);
        }

        nav.navbar {
            background: linear-gradient(90deg, #00796b, #004d40) !important;
            box-shadow: 0 6px 20px rgba(0, 77, 64, 0.35);
        }
        nav.navbar .navbar-brand {
            color: white !important;
            font-weight: 700;
            font-size: 1.3rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
        nav.navbar .btn-outline-primary {
            color: #a5d6a7;
            border-color: #a5d6a7;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 25px;
        }
        nav.navbar .btn-outline-primary:hover {
            background-color: #a5d6a7;
            color: #004d40;
        }
        nav.navbar .btn-outline-secondary {
            color: #f0f0f0;
            border-color: #f0f0f0;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 25px;
        }
        nav.navbar .btn-outline-secondary:hover {
            background-color: #f0f0f0;
            color: #004d40;
        }

        /* Preview image */
        #preview-image {
            display: block;
            margin: 1rem auto 1.5rem auto;
            max-width: 100%;
            max-height: 250px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 77, 64, 0.3);
            object-fit: contain;
        }

        @media (max-width: 576px) {
            .container {
                padding: 2rem 1.5rem;
                margin: 1rem 1rem 3rem;
            }
            h2 {
                font-size: 1.75rem;
            }
        }
    </style>



    <div class="container">
        <h2>Créer un nouvel événement</h2>

        {{-- Erreurs validation --}}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('evenements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="titre" class="form-label">Titre de l'événement</label>
                <input type="text" name="titre" id="titre" class="form-control" placeholder="Ex: Forum de l'emploi" required>
                @error('titre')
                    <span class="error-message">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="lieu" class="form-label">Lieu</label>
                <input type="text" name="lieu" id="lieu" class="form-control" placeholder="Ex: Centre des congrès, Oujda" required>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Décrivez brièvement l'événement" required>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_de_début" class="form-label">Date de début</label>
                        <input type="date" name="date_de_début" id="date_de_début" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_de_fin" class="form-label">Date de fin</label>
                        <input type="date" name="date_de_fin" id="date_de_fin" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="heure" class="form-label">Heure</label>
                <input type="time" name="heure" id="heure" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="type_events_id" class="form-label">Type d'événement</label>
                <select name="type_events_id" id="type_events_id" class="form-select" required>
                    <option value="">-- Sélectionnez un type --</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Image de l'événement</label>
                <div class="image-upload-container">
                    <label for="image" class="upload-label">
                        <i class="fas fa-cloud-upload-alt"></i> Choisir une image (JPG/PNG, max 2MB)
                    </label>
                    <input type="file" name="image" id="image" accept="image/png, image/jpeg" onchange="previewImage(event)" style="display: none;">
                    <img id="preview-image" src="#" alt="Aperçu de l'image">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Événement certifié</label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" name="certifie" id="certifie_oui" value="1" required>
                        <label for="certifie_oui">Oui</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="certifie" id="certifie_non" value="0" required>
                        <label for="certifie_non">Non</label>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <i class="fas fa-check-circle"></i> Créer l'événement
                </button>
                <a href="{{ route('evenements.index') }}" class="btn-cancel">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview-image');
        
        if (input.files && input.files[0]) {
            const file = input.files[0];
            
            // Vérification de la taille
            if (file.size > 2 * 1024 * 1024) {
                alert('La taille du fichier ne doit pas dépasser 2 Mo.');
                input.value = "";
                preview.style.display = 'none';
                return;
            }
            
            // Vérification du type
            const validTypes = ['image/jpeg', 'image/png'];
            if (!validTypes.includes(file.type)) {
                alert('Seuls les fichiers JPG et PNG sont acceptés.');
                input.value = "";
                preview.style.display = 'none';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    }

    // Animation pour les champs requis
    document.querySelectorAll('[required]').forEach(el => {
        el.addEventListener('invalid', () => {
            el.style.borderColor = 'var(--error)';
            setTimeout(() => {
                el.style.borderColor = 'var(--primary-light)';
            }, 2000);
        });
    });
</script>
@endsection