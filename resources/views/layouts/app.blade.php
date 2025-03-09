<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion Bibliothèque')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        header {
            background-color: var(--primary-color);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        nav ul {
            display: flex;
            gap: 2rem;
            list-style: none;
            margin: 0;
            padding: 0;
            align-items: center;
        }

        nav a {
            color: var(--light-color);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        nav a:hover {
            background-color: #34495e;
            transform: translateY(-2px);
        }

        .auth-container {
            max-width: 400px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        button {
            background-color: var(--secondary-color);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 2rem 0;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: var(--primary-color);
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                gap: 1rem;
            }

            .auth-container {
                margin: 1rem;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('livres.index') }}">Livres</a></li>
                <li><a href="{{ route('auteurs.index') }}">Auteurs</a></li>
                <li><a href="{{ route('emprunts.index') }}">Emprunts</a></li>

                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Déconnexion</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                    <li><a href="{{ route('register') }}">Inscription</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <style>
        footer {
            background-color: #2d545e;
            color: #f5f3e7;
            padding: 2rem 1rem;
            margin-top: 3rem;
            font-family: 'Cormorant Garamond', serif;
            text-align: center;
            position: relative;
            border-top: 3px solid #c19a6b;
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            position: relative;
            display: inline-block;
            padding: 0 1rem;
        }

        footer p::before,
        footer p::after {
            content: '✻';
            color: #c19a6b;
            margin: 0 0.8rem;
            font-size: 1.2rem;
            position: relative;
            top: -1px;
        }

        footer:hover {
            background-color: #25424b;
            transition: background-color 0.3s ease;
        }

        @media (max-width: 768px) {
            footer {
                padding: 1.5rem 0.5rem;
            }

            footer p {
                font-size: 0.9rem;
            }

            footer p::before,
            footer p::after {
                margin: 0 0.4rem;
                font-size: 1rem;
            }
        }
    </style>

    <footer>
        <p>&copy; {{ date('Y') }} Gestion Bibliothèque - Tous droits réservés</p>
    </footer>
</body>
</html>
