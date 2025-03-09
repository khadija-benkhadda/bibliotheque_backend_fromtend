<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Auteur;  // Ajoute l'importation du modèle Auteur

class AuteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Auteur::create(['nom' => 'Hugo', 'prenom' => 'Victor']);
        Auteur::create(['nom' => 'Camus', 'prenom' => 'Albert']);
    }
}
