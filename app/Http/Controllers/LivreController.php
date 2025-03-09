<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Auteur;
use App\Models\Historique;
use Illuminate\Http\Request;
use App\Events\LivreModifie;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::with('auteur')->paginate(10);
        return view('livres.index', compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auteurs = Auteur::all();
        return view('livres.create', compact('auteurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'annee_publication' => 'required|integer',
            'nombre_pages' => 'required|integer',
            'auteur_id' => 'required|exists:auteurs,id',
        ]);

        $livre = Livre::create($request->all());

        // 🔹 Enregistrer l'événement d'ajout du livre
        event(new LivreModifie($livre, 'ajouté', ['titre' => $livre->titre]));

        return redirect()->route('livres.index')->with('success', 'Livre ajouté avec succès!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        $auteurs = Auteur::all();
        return view('livres.edit', compact('livre', 'auteurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'annee_publication' => 'required|integer',
            'nombre_pages' => 'required|integer',
            'auteur_id' => 'required|exists:auteurs,id',
        ]);

        // Sauvegarde des anciennes valeurs pour l'historique
        $ancienTitre = $livre->titre;

        $livre->update($request->all());

        // 🔹 Enregistrer l'événement de modification du livre
        event(new LivreModifie($livre, 'modifié', [
            'ancien_titre' => $ancienTitre,
            'nouveau_titre' => $livre->titre
        ]));

        return redirect()->route('livres.index')->with('success', 'Livre mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        $titre = $livre->titre;

        // 🔹 Enregistrer l'événement de suppression du livre
        event(new LivreModifie($livre, 'supprimé', ['titre' => $titre]));

        $livre->delete();
        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès!');
    }
}
