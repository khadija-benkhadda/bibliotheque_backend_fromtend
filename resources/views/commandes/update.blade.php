@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier la commande #{{ $commande->id }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('commandes.update', $commande->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Modifier le client -->
        <div class="mb-3">
            <label for="client_id" class="form-label">Client :</label>
            <select name="client_id" class="form-control">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $commande->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }} {{ $client->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Modifier la date de commande -->
        <div class="mb-3">
            <label for="date" class="form-label">Date :</label>
            <input type="date" name="date" class="form-control" value="{{ $commande->date }}" required>
        </div>

        <!-- Produits commandés -->
        <h3>Produits commandés</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commande->produits as $produit)
                    <tr>
                        <td>{{ $produit->nom }} - {{ $produit->prix }} €</td>
                        <td>
                            <input type="number" name="qte_cmd[{{ $produit->id }}]" value="{{ $produit->pivot->qte_cmd }}" min="1" class="form-control">
                        </td>
                        <td>
                            <a href="{{ route('commandes.removeProduct', ['commande' => $commande->id, 'produit' => $produit->id]) }}" class="btn btn-danger">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Ajouter un nouveau produit -->
        <h3>Ajouter un produit</h3>
        <div class="mb-3">
            <label for="produit_id" class="form-label">Produit :</label>
            <select name="produit_id" class="form-control">
                @foreach($produits as $produit)
                    <option value="{{ $produit->id }}">{{ $produit->nom }} - {{ $produit->prix }} €</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="qte_cmd" class="form-label">Quantité :</label>
            <input type="number" name="qte_cmd" min="1" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
