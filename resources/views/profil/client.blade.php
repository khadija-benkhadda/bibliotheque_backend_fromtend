<h1>Bonjour, {{ session('user')->login }} !</h1>
<p>Vous êtes un client.</p>
<a href="{{ url('/deconnexion') }}">Se déconnecter</a>
