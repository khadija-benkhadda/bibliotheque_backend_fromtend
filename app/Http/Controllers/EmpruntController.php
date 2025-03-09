<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprunt;
use App\Models\Livre;

class EmpruntController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Emprunt::with('livre');

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date_emprunt', [
                $request->start_date,
                $request->end_date
            ]);
        }

        $emprunts = $query->get(); // Get filtered or all emprunts

        return view('emprunts.index', compact('emprunts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $livres = Livre::all();
        return view('emprunts.create', compact('livres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'livre_id' => 'required|exists:livres,id',
            'date_emprunt' => 'required|date',
            'date_retour' => 'nullable|date|after_or_equal:date_emprunt',
        ]);

        Emprunt::create([
            'livre_id' => $request->livre_id,
            'date_emprunt' => $request->date_emprunt,
            'date_retour' => $request->date_retour,
        ]);

        return redirect()->route('emprunts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprunt $emprunt)
    {
        $livres = Livre::all();
        return view('emprunts.edit', compact('emprunt', 'livres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emprunt $emprunt)
    {
        $request->validate([
            'livre_id' => 'required|exists:livres,id',
            'date_emprunt' => 'required|date|before_or_equal:date_retour',
            'date_retour' => 'nullable|date|after_or_equal:date_emprunt',
        ]);

        $emprunt->update([
            'livre_id' => $request->livre_id,
            'date_emprunt' => $request->date_emprunt,
            'date_retour' => $request->date_retour,
        ]);

        return redirect()->route('emprunts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprunt $emprunt)
    {
        $emprunt->delete();
        return redirect()->route('emprunts.index');
    }
}
