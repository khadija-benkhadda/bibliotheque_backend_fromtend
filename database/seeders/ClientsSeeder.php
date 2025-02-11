<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
class ClientsSeeder extends Seeder
{
    public function run()
    {
        Client::create(['nom' => 'khadija', 'prenom' => 'ben khadda']);
        Client::create(['nom' => 'youssera', 'prenom' => 'hamdane']);
        Client::create(['nom' => 'amal', 'prenom' => 'fertoul']);

    }
}

