<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commande;
use App\Models\Client;


class CommandesSeeder extends Seeder
{
    public function run()
    {
        // Récupérer des clients existants
        $clients = Client::all();

        // Vérifier si des clients existent avant d'insérer des commandes
        if ($clients->count() > 0) {
            Commande::create(['date' => now(), 'client_id' => $clients->random()->id]);
            Commande::create(['date' => now()->subDays(2), 'client_id' => $clients->random()->id]);
            Commande::create(['date' => now()->subDays(5), 'client_id' => $clients->random()->id]);
        } else {
            echo "⚠️ Aucun client trouvé ! Exécutez d'abord le seeder ClientsSeeder.\n";
        }
    }
}
