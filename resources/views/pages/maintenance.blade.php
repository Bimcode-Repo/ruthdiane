<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ruth Diane - Maintenance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Andada+Pro:wght@400;500;600;700;800&family=Joan&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Andada Pro', serif;
            background-color: #35322f;
            color: #fff;
            min-height: 100vh;
        }
        .container {
            max-width: 520px;
            margin: 60px auto 0 auto;
            padding: 24px 32px;
            background: #dcc198;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(53,50,47,0.10);
            text-align: center;
        }
        .logo-box {
            margin-bottom: 32px;
        }
        .logo {
            width: 65px;
            height: auto;
            border-radius: 6px;
            background: #dcc198;
        }
        h1 {
            font-family: 'Andada Pro', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: #35322f;
            margin: 0 0 16px 0;
        }
        p {
            font-family: 'Joan', serif;
            font-size: 1.13rem;
            color: #fff;
            margin-bottom: 28px;
        }
        .btn {
            background: #35322f;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            padding: 12px 28px;
            font-size: 1rem;
            font-family: 'Andada Pro', serif;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.17s;
            cursor: pointer;
            display: inline-block;
        }
        .btn:hover {
            background: #c3a376;
        }
        /* Responsive */
        @media (max-width: 650px) {
            .container {
                padding: 18px 12px;
            }
            .logo {
                width: 44px;
            }
            h1 {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo-box">
        <img src="{{ asset('medias/images/logo/logo.svg') }}" alt="Logo Ruth Diane" class="logo">
    </div>
    <h1>Site en Maintenance 🛠️</h1>
    <p>
        Nous revenons très vite ! <br>
        Le site Ruth Diane Interiors fait peau neuve.<br>
        Merci pour ta patience et à très bientôt ✨
    </p>
    <a href="/" class="btn">Retour accueil</a>
</div>
</body>
</html>
