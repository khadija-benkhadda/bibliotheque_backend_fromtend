<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Profil Client</title>
</head>
<body>
    <h2>Bonjour, Client {{ $compte->login }} !</h2>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>
</body>
</html>
