<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ClientsSeeder::class,
            ProduitsSeeder::class,
            CommandesSeeder::class,
        ]);
        // Dans DatabaseSeeder.php
$commande->produits()->attach([
    1 => ['qte_cmd' => 3],
    2 => ['qte_cmd' => 5]
]);
    }
}
