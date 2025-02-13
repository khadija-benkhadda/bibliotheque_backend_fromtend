<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commande;
use App\Models\Client;
class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        $client = Client::first(); 

        if ($client) {
            Commande::create([
                'date' => now(),
                'client_id' => $client->id,
            ]);
        } else {
            echo "Aucun client trouvé pour ajouter une commande.";
        }
    }
}
