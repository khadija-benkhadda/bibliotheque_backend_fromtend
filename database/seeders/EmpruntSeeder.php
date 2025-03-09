<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emprunt;  // Ajoute l'import du modèle Emprunt

class EmpruntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Emprunt::create([
            'livre_id' => 1,
            'date_emprunt' => now(),
            'date_retour' => null
        ]);
    }
}
