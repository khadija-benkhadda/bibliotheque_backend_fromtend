<h1>Liste des clients</h1>
<ul>
    @foreach ($clients as $client)
        <li>{{ $client->login }}</li>
    @endforeach
</ul>
<a href="{{ url('/deconnexion') }}">Se déconnecter</a>
