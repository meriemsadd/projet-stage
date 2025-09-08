<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Validation Présence</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Montserrat', Arial, sans-serif;
            background: #f4f6fb;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background: #ffffff;
            max-width: 480px;
            width: 90%;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.8s ease-out;
        }

        .logo {
            display: block;
            margin: 0 auto 20px auto;
            max-width: 100px;
            height: auto;
        }

        .title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #1A237E;
        }

        .message {
            font-size: 1.2rem;
            font-weight: 500;
            padding: 20px 15px;
            border-radius: 15px;
            display: inline-block;
            min-width: 260px;
            box-shadow: 0 5px 20px rgba(41,98,255,0.1);
            transition: all 0.3s ease;
        }

        .message.ok {
            background: #d4edda;
            color: #155724;
        }

        .message.warn {
            background: #fff3cd;
            color: #856404;
        }

        .message:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(41,98,255,0.15);
        }

        .info {
            margin-top: 25px;
            font-size: 0.95rem;
            color: #4a5568;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px);}
            to { opacity: 1; transform: translateY(0);}
        }

    </style>
</head>
<body>

    <div class="card">
        <img src="<?php echo e(asset('images/R.png')); ?>" alt="Logo Wilaya" class="logo">

        <div class="title">Validation de présence</div>

        <div class="message <?php echo e(str_contains($message, 'déjà') ? 'warn' : 'ok'); ?>">
            <?php echo e($message); ?>

        </div>

        <div class="info">
            Merci de votre participation.<br>
            Veuillez garder ce message comme preuve de votre présence.
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\Users\lenovo\Documents\projet-stage\resources\views/presence/result.blade.php ENDPATH**/ ?>