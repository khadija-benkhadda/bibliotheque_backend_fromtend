
@foreach($commandes as $commande)
    <tr>
        <td>{{ $commande->id }}</td>
        <td>{{ $commande->client->nom }} {{ $commande->client->prenom }}</td>
        <td>{{ $commande->date->format('d/m/Y H:i') }}</td>
        <td>
            @foreach($commande->produits as $produit)
                {{ $produit->nom }} (x{{ $produit->pivot->qte_cmd }})<br>
            @endforeach
        </td>
    </tr>
@endforeach

{{ $commandes->links() }}
