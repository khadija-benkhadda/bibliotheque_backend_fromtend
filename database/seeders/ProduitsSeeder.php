<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produit;
class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('produits')->insert([
        ['nom' => 'Ordinateur', 'qte_stock' => 10, 'prix' => 500.00],
        ['nom' => 'Téléphone', 'qte_stock' => 20, 'prix' => 300.00]
    ]);
}

}
