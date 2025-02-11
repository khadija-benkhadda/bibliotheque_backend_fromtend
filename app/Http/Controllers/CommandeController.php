<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Produit;
class CommandeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $commandes = Commande::with('client')
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('client', function ($q) use ($search) {
                    $q->where('nom', 'like', "%$search%");
                });
            })
            ->paginate(10);

        return view('commandes.index', compact('commandes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'produits' => 'required|array',
            'produits.*.id' => 'required|exists:produits,id',
            'produits.*.qte' => 'required|integer|min:1'
        ]);

        $commande = Commande::create([
            'date' => now(),
            'client_id' => $validated['client_id']
        ]);

        foreach ($validated['produits'] as $produit) {
            $commande->produits()->attach($produit['id'], [
                'qte_cmd' => $produit['qte']
            ]);
        }

        return redirect()->route('commandes.index');
    }

    // Autres méthodes...
}