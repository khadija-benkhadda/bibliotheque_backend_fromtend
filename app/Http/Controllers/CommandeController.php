<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    // public function index() {
    //     $commandes = Commande::paginate(10);
    //     // Nombre de commandes par client
    //     $commandesParClient = Client::withCount('commandes')->get();
    //     return view('commandes.index', compact('commandes'));
    // }
    public function index(Request $request)
    {
        
        // Récupérer tous les clients pour le formulaire de recherche
 
        $clients = Client::all();

        // Récupérer le nombre de commandes par client
        $commandesParClient = Client::withCount('commandes')->get();

        //recherche
        $clientId = $request->input('client_id'); // Récupérer l'ID du client sélectionné

        if (!$clientId) {
            $commandes = Commande::paginate(10);
        } else {
            $commandes = Commande::where('client_id', $clientId)->paginate(10);
        }
     

        // Passer les commandes, les clients et le nombre de commandes par client à la vue
        return view('commandes.index', compact('commandes', 'commandesParClient', 'clients','clientId'));
    }

    public function create() {
        $clients = Client::all();
        //$produits = Produit::all();
        return view('commandes.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date' => 'required|date|before_or_equal:today',
        ]);

        // Crée une nouvelle commande
        $commande = Commande::create([
            'client_id' => $request->client_id,
            'date' => $request->date,
        ]);
        
        return redirect()->route('commandes.index')->with('success', 'Commande créée avec succès!');
    }

    public function show($id) {
        $commande = Commande::with('produits')->findOrFail($id); 
        $produits = Produit::all();
        return view('commandes.show', compact('commande', 'produits'));
    }

    public function edit(Commande $commande) {
        $clients = Client::all();
       // $produits = Produit::all();
        return view('commandes.edit', compact('commande', 'clients'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date' => 'required|date|before_or_equal:today',
        ]);
        // Récupérer la commande
        $commande = Commande::findOrFail($id);
        $commande->update([
            'client_id' => $request->client_id,
            'date' => $request->date,
        ]);
  
        // Ajouter le produit à la commande (via la relation many-to-many)
        //$commande->produits()->attach($request->produit_id, ['qte_cmd' => $request->qte_cmd]);

        return redirect()->route('commandes.index')->with('success', 'Produit ajouté à la commande');
    }

    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();

        return redirect()->route('commandes.index')->with('success', 'Commande supprimée avec succès.');
    }

 
}
