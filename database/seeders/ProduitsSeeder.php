<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('produits')->insert([
            [
                'nom' => 'Ordinateur',
                'qte_stock' => 10,
                'prix' => 500.00,
                'file' => 'uploads/ordinateur.jpg' // Ajout du fichier (exemple)
            ],
            [
                'nom' => 'Téléphone',
                'qte_stock' => 20,
                'prix' => 300.00,
                'file' => 'uploads/telephone.jpg' // Ajout du fichier (exemple)
            ]
        ]);
    }
}
