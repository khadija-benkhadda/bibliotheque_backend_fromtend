<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    public function index()
    {
        $historiques = Historique::with(['livre', 'user'])->paginate(10);
        return view('historiques.index', compact('historiques'));
    }
}
