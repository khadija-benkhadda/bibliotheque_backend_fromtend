{{-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Commandes</title>
</head>
<body>
    <h1>Liste des Commandes</h1>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Client</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
            <tr>
                <td>{{ $commande->id }}</td>
                <td>{{ $commande->date }}</td>
                <td>{{ $commande->client->nom }} {{ $commande->client->prenom }}</td>
                <td>
                    <a href="{{ route('commandes.show', $commande->id) }}">Voir</a>
                    <a href="{{ route('commandes.edit', $commande->id) }}">Modifier</a>
                    <a href="{{ route('commandes.destroy', $commande->id) }}">Supprimer</a>
                </td>
            </tr>
            @endforeach
            

        </tbody>
    </table>

    <!-- Pagination Links -->
    <div>
        {{ $commandes->links() }}
    </div>
</body>
</html> --}}
@extends('layouts.app')
@section('content')
    

    <h1>Liste des Commandes</h1>

    <!-- Formulaire de recherche par client -->
    <form method="GET" action="{{ route('commandes.index') }}" class="mb-4">
        <div class="form-group">
            <label for="client_id">Sélectionner un client :</label>
            <select name="client_id" id="client_id" class="form-control" onchange="this.form.submit()">
                <option value="">Tous les clients</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ isset($clientId) && $clientId == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }} {{ $client->prenom }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>
    <!-- Afficher le clientId pour tester -->
    <div>Client sélectionné: {{ $clientId ?? 'Aucun' }}</div>
    
    

    <h2>Nombre de Commandes par Client</h2>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Client</th>
                <th>Nombre de Commandes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandesParClient as $client)
            <tr>
                <td>{{ $client->nom }} {{ $client->prenom }}</td>
                <td>{{ $client->commandes_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('commandes.create') }}">Ajouter commande</a>

    <!-- Affichage de la liste des commandes -->
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Client</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
            <tr>
                <td>{{ $commande->id }}</td>
                <td>{{ $commande->date }}</td>
                <td>{{ $commande->client->nom }} {{ $commande->client->prenom }}</td>
                <td>
                    <a href="{{ route('commandes.show', $commande->id) }}">Voir</a>
                    <a href="{{ route('commandes.edit', $commande->id) }}">Modifier</a>
                    {{-- <a href="{{ route('commandes.delete', $commande->id) }}">Supprimer</a> --}}
                    <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div>
        {{ $commandes->links() }}
    </div>
@endsection
