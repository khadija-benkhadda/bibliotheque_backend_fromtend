<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stagiaire;
use App\Models\Group;
class GroupsController extends Controller
{
    public function index()
    {
        $groups = Group::with('stagiaires')->get();
        return response()->json($groups, 200);
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:groups',
        ]);

        Group::create($request->all());
        return response()->json($request, 200);
    }

    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    public function show($id)
    {
        $group = Group::find($id);

        if (!$group) {
            return response()->json($group, 404);
        }

        return response()->json($group, 200);
    }

    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|unique:groups,name,' . $group->id,
        ]);

        $group->update($request->all());
        // return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
        return response()->json($group, 200);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        // return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
        return response()->json($group, 200);
    }
}
