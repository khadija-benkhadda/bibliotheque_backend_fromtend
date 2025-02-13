@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails de la commande #{{ $commande->id }}</h2>
    <p><strong>Client :</strong> {{ $commande->client->nom }} {{ $commande->client->prenom }}</p>
    <p><strong>Date :</strong> {{ $commande->date }}</p>

    <h3>Produits commandés</h3>
    <table class="table" border="1" width="100%">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commande->produits as $produit)
    <tr>
        <td>{{ $produit->nom }}</td>
        <td>{{ $produit->pivot->qte_cmd }}</td>  <!-- Accède à la quantité commandée -->
        <td>{{ $produit->prix }} €</td>
        <td>{{ $produit->pivot->qte_cmd * $produit->prix }} €</td>
    </tr>
@endforeach

        </tbody>
    </table>

    <h3>Ajouter des produits</h3>
    <form action="{{ route('commandes.update', $commande->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="produit_id">Produit :</label>
        <select name="produit_id">
            @foreach($produits as $produit)
                <option value="{{ $produit->id }}">{{ $produit->nom }} - {{ $produit->prix }} €</option>
            @endforeach
        </select>

        <label for="qte_cmd">Quantité :</label>
        <input type="number" name="qte_cmd" min="1" required>

        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
    {{-- <div class="container">
        <h2>Confirmer la suppression</h2>
        <p>Êtes-vous sûr de vouloir supprimer cette commande ?</p>
    
        <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Oui, supprimer</button>
            <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div> --}}
</div>
@endsection
