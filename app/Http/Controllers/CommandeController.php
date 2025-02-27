<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommandeController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::all();
        $commandesParClient = Client::withCount('commandes')->get();

        $clientId = $request->input('client_id');

        $commandes = $clientId
            ? Commande::where('client_id', $clientId)->paginate(10)
            : Commande::paginate(10);

        return view('commandes.index', compact('commandes', 'commandesParClient', 'clients', 'clientId'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('commandes.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date' => 'required|date|before_or_equal:today',
        ]);

        $commande = Commande::create([
            'client_id' => $request->client_id,
            'date' => $request->date,
        ]);

        return redirect()->route('commandes.index')->with('success', 'Commande créée avec succès!');
    }

    public function show($id)
    {
        $commande = Commande::with('produits')->findOrFail($id);
        $produits = Produit::all();
        return view('commandes.show', compact('commande', 'produits'));
    }

    public function edit(Commande $commande)
    {
        $clients = Client::all();
        return view('commandes.edit', compact('commande', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date' => 'required|date|before_or_equal:today',
        ]);

        $commande = Commande::findOrFail($id);
        $commande->update([
            'client_id' => $request->client_id,
            'date' => $request->date,
        ]);

        return redirect()->route('commandes.index')->with('success', 'Commande mise à jour avec succès');
    }

    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();

        return redirect()->route('commandes.index')->with('success', 'Commande supprimée avec succès.');
    }

    public function updateQuantity(Request $request, Commande $commande, Produit $produit)
    {
        $validated = $request->validate([
            'qte_cmd' => 'required|integer|min:1',
        ]);

        $commande->produits()->updateExistingPivot($produit->id, [
            'qte_cmd' => $validated['qte_cmd'],
        ]);

        return redirect()->route('commandes.show', $commande->id)->with('success', 'Quantité mise à jour avec succès');
    }

    public function deleteProduct(Commande $commande, Produit $produit)
    {
        $commande->produits()->detach($produit->id);

        return redirect()->route('commandes.show', $commande->id)->with('success', 'Produit supprimé avec succès');
    }

    public function addProduct(Request $request, Commande $commande)
    {
        $validated = $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'qte_cmd' => 'required|integer|min:1',
            'file' => 'nullable|mimes:jpg,png,jpeg,pdf|max:2048'
        ]);

        // Gestion du fichier
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads');
        }

        // Ajouter le produit à la commande avec la quantité et le fichier
        $commande->produits()->attach($validated['produit_id'], [
            'qte_cmd' => $validated['qte_cmd'],
            'file' => $filePath, // Sauvegarde du chemin du fichier
        ]);

        return redirect()->route('commandes.show', $commande->id)->with('success', 'Produit ajouté avec fichier');
    }
}

