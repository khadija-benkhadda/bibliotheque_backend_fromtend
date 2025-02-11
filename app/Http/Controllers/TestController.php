<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $age = 20;
        $nom = 'Khadija';
        
        // Définition correcte du tableau multidimensionnel
        $items = [
            ['name' => 'Ahmed', 'prenom' => 'Ben Khadda', 'filier' => 'Profe'],
            ['name' => 'Sara', 'prenom' => 'Alami', 'filier' => 'Science'],
            ['name' => 'Yassir', 'prenom' => 'Benkirane', 'filier' => 'Informatique'],
        ];

        // Passe les variables $age, $nom et $items à la vue
        return view('acceil', compact('age', 'nom', 'items'));
    }
}
