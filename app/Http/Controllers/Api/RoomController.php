<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Http\Resources\RoomResource;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::query();

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        return RoomResource::collection($query->paginate(10));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|string|in:disponible,occupé,maintenance'
        ]);

        $room = Room::create($validatedData);
        return new RoomResource($room);
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return new RoomResource($room);
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'status' => 'sometimes|required|string|in:disponible,occupé,maintenance'
        ]);
        $room->update($validatedData);
        return new RoomResource($room);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json(['message' => 'Chambre supprimée avec succès'], 200);
    }
    public function __construct()
{
    $this->middleware('auth:sanctum');
}


}

