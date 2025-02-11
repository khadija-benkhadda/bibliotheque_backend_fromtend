<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;

class ProduitsSeeder extends Seeder
{
    public function run()
    {
        Produit::create(['nom' => 'Ordinateur', 'qte_stock' => 10, 'prix' => 1500.00]);
        Produit::create(['nom' => 'Souris', 'qte_stock' => 50, 'prix' => 20.99]);
        Produit::create(['nom' => 'Clavier', 'qte_stock' => 30, 'prix' => 45.50]);
    }
}
