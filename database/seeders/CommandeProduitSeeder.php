<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commande;
use App\Models\Produit;

class CommandeProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Récupération des commandes et produits existants
        $commandes = Commande::all();
        $produits = Produit::all();

        // Ajouter une relation pour chaque commande avec un ou plusieurs produits
        foreach ($commandes as $commande) {
            //  Sélection de produits aléatoires
            $produitsSelectionnes = $produits->random(rand(1, 3)); // Sélectionner entre 1 et 3 produits par commande
            
            // Ajouter chaque produit à la commande
            foreach ($produitsSelectionnes as $produit) {
                // Créer une entrée dans la table commande_produit
                $commande->produits()->attach($produit->id, [
                    'qte_cmd' => rand(1, 5) // Quantité aléatoire entre 1 et 5
                ]);
            }
        }
    }
}
