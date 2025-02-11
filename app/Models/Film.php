<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
  
    public function index()
    {
    $stagiaires=Stagiaire::all();
    return
    view('stagiaires.index',compact('stagiaires'));
    }

public function show(Stagiaire $stagiaire)
{
return
view('stagiaires.show',compact('stagiaire'));
}


}
