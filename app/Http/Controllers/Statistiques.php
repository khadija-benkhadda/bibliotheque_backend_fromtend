<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Statistiques extends Controller
{
    public function statistiques()
    {
        // Nombre de commandes par client
        $clientsCommandes = Client::withCount('commandes')->get();
        
        // Chiffre d'affaires par produit
        $caProduits = Produit::withSum(['commandes as total_vendu' => function($query) {
            $query->select(DB::raw('sum(qte_cmd * prix)'));
        }], 'total_vendu')->get();
    
        return view('statistiques', compact('clientsCommandes', 'caProduits'));
    }
}
