<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Profil Admin</title>
</head>
<body>
    <h2>Bienvenue Admin</h2>
    <h3>Liste des clients inscrits</h3>
    <ul>
        @foreach($clients as $client)
            <li>{{ $client->login }}</li>
        @endforeach
    </ul>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>
</body>
</html>
