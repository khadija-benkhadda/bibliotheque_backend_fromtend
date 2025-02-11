<tbody>
    @foreach($commandes as $commande)
    <tr>
        <th scope="row">{{ $commande->id }}</th>
        <td>{{ $commande->client->nom ?? 'Client inconnu' }}</td> {{-- Sécurisé --}}
        <td>{{ $commande->date->translatedFormat('d F Y') }}</td> {{-- Nécessite $dates castées --}}
        <td>
            @forelse($commande->produits as $produit)
            <div class="product-item">
                <span class="product-name">{{ $produit->nom }}</span>
                <span class="product-qty">(x{{ $produit->pivot->qte_cmd }})</span>
                <span class="badge bg-{{ $produit->qte_stock > 0 ? 'success' : 'danger' }}">
                    {{ $produit->qte_stock }} en stock
                </span>
            </div>
            @empty
            <div class="text-danger small">Aucun produit associé</div>
            @endforelse
        </td>
        <td>
            <a href="{{ route('commandes.edit', $commande) }}" class="btn btn-sm btn-outline-primary">
                ✏️
            </a>
            <form action="{{ route('commandes.destroy', $commande) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">🗑️</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>