@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails de la commande #{{ $commande->id }}</h2>
    <p><strong>Client :</strong> {{ $commande->client->nom }} {{ $commande->client->prenom }}</p>
    <p><strong>Date :</strong> {{ $commande->date }}</p>

    <h3>Ajouter des produits</h3>
    <form action="{{ route('commandes.addProduct', $commande->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="produit_id">Produit :</label>
        <select name="produit_id">
            @foreach($produits as $produit)
                <option value="{{ $produit->id }}">{{ $produit->nom }} - {{ $produit->prix }} €</option>
            @endforeach
        </select>

        <label for="qte_cmd">Quantité :</label>
        <input type="number" name="qte_cmd" min="1" required>

        <label for="file">Ajouter un fichier :</label>
        <input type="file" name="file" class="form-control">

        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>

    <h3>Produits commandés</h3>
    <table class="table" border="1" width="100%">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
                <th>Fichier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commande->produits as $produit)
                <tr>
                    <td>{{ $produit->nom }}</td>
                    <td>
                        <form action="{{ route('commandes.updateQuantity', ['commande' => $commande->id, 'produit' => $produit->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="qte_cmd" value="{{ $produit->pivot->qte_cmd }}" min="1" required>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </form>
                    </td>
                    <td>{{ $produit->prix }} €</td>
                    <td>{{ $produit->pivot->qte_cmd * $produit->prix }} €</td>
                    <td>
                        @if($produit->pivot->file)
                            <a href="{{ asset('storage/' . $produit->pivot->file) }}" target="_blank">Voir le fichier</a>
                        @else
                            Aucun fichier
                        @endif
                    </td>
                    <td>
                        <!-- Supprimer le produit de la commande -->
                        <form action="{{ route('commandes.deleteProduct', ['commande' => $commande->id, 'produit' => $produit->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit de la commande ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
