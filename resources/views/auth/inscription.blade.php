<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form action="{{ route('inscription') }}" method="POST">
        @csrf
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="mot_passe" placeholder="Mot de passe" required>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
