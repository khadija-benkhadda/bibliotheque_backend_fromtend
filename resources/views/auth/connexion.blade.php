<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="{{ route('connexion') }}" method="POST">
        @csrf
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="mot_passe" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
