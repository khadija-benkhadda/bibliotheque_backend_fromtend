<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stagiaire;

class StagiaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stagiaires = [
            ['nom' => 'Dupont', 'prenom' => 'Jean', 'email' => 'jean.dupont@example.com', 'date_naissance' => '1998-05-10', 'note' => 15, 'group_id' => 1],
            ['nom' => 'Martin', 'prenom' => 'Sophie', 'email' => 'sophie.martin@example.com', 'date_naissance' => '2000-09-15', 'note' => 18, 'group_id' => 2],
            ['nom' => 'Bernard', 'prenom' => 'Paul', 'email' => 'paul.bernard@example.com', 'date_naissance' => '1995-03-22', 'note' => 12, 'group_id' => 1],
            ['nom' => 'Dubois', 'prenom' => 'Claire', 'email' => 'claire.dubois@example.com', 'date_naissance' => '1999-07-08', 'note' => 16, 'group_id' => 3],
            ['nom' => 'Moreau', 'prenom' => 'Luc', 'email' => 'luc.moreau@example.com', 'date_naissance' => '1997-12-30', 'note' => 14, 'group_id' => 2],
            ['nom' => 'Lefebvre', 'prenom' => 'Emma', 'email' => 'emma.lefebvre@example.com', 'date_naissance' => '2001-06-25', 'note' => 19, 'group_id' => 3],
            ['nom' => 'Lemoine', 'prenom' => 'Thomas', 'email' => 'thomas.lemoine@example.com', 'date_naissance' => '1996-11-11', 'note' => 13, 'group_id' => 1],
            ['nom' => 'Rousseau', 'prenom' => 'Julie', 'email' => 'julie.rousseau@example.com', 'date_naissance' => '1998-04-17', 'note' => 17, 'group_id' => 2],
            ['nom' => 'Petit', 'prenom' => 'Antoine', 'email' => 'antoine.petit@example.com', 'date_naissance' => '1994-08-05', 'note' => 11, 'group_id' => 1],
            ['nom' => 'Chevalier', 'prenom' => 'Camille', 'email' => 'camille.chevalier@example.com', 'date_naissance' => '2000-02-14', 'note' => 20, 'group_id' => 3],
        ];

        foreach ($stagiaires as $stagiaire) {
            Stagiaire::create($stagiaire);
        }
    }
}
