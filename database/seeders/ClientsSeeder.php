<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('clients')->insert([
        ['nom' => 'khadija', 'prenom' => 'ben khadda'],
        ['nom' => 'youssera', 'prenom' => 'hamdane'],
    ]);
}

}
