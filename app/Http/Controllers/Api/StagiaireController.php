<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stagiaire;
use App\Models\Group;

class StagiaireController extends Controller
{
    public function index(Request $request)
{
    $query = Stagiaire::query();

    if ($request->has('email') && $request->email != '') {
        $query->where('email', 'like', '%' . $request->email . '%');
    }

    $stagiaires = $query->with('group')->get();

    return response()->json($stagiaires, 200);
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:20',
            'prenom' => 'required|string|max:20',
            'email' => 'required|email|unique:stagiaires,email',
            'date_naissance' => 'required|date',
            'note' => 'required|string|max:50',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        $stagiaire = Stagiaire::create($validated);

        return response()->json($stagiaire, 201);
    }

    public function show($id)
    {
        $stagiaire = Stagiaire::with('group')->find($id);

        if (!$stagiaire) {
            return response()->json(['message' => 'Stagiaire non trouvé'], 404);
        }

        return response()->json($stagiaire, 200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:20',
            'prenom' => 'required|string|max:20',
            'email' => 'required|email|unique:stagiaires,email,' . $id,
            'date_naissance' => 'required|date',
            'note' => 'required|string|max:3',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors(), 422);
        }

        $stagiaire = Stagiaire::find($id);

        if (!$stagiaire) {
            return response()->json(['message' => 'Stagiaire non trouvé'], 404);
        }

        $stagiaire->update($validated);

        return response()->json($stagiaire, 200);
    }


    public function destroy($id)
    {
        $stagiaire = Stagiaire::find($id);

        if (!$stagiaire) {
            return response()->json(['message' => 'Stagiaire non trouvé'], 404);
        }

        $stagiaire->delete();

        return response()->json(['message' => 'Stagiaire supprimé avec succès'], 200);
    }
}
