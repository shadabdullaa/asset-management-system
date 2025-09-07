<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Floor;

class FloorController extends Controller
{
    // Show all floors
    public function index()
    {
        $floors = Floor::all(); // get all floors from database
        return view('floors.index', compact('floors'));
    }

    // Show form to create a new floor
    public function create()
    {
        return view('floors.create');
    }

    // Save new floor
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'floor_name' => 'required|max:50',
            'description' => 'nullable'
        ]);

        // Create floor
        Floor::create([
            'floor_name' => $request->floor_name,
            'description' => $request->description
        ]);

        return redirect()->route('floors.index')->with('success', 'Floor created successfully!');
    }

    // Show form to edit a floor
    public function edit($id)
    {
        $floor = Floor::findOrFail($id);
        return view('floors.edit', compact('floor'));
    }

    // Update floor
    public function update(Request $request, $id)
    {
        $request->validate([
            'floor_name' => 'required|max:50',
            'description' => 'nullable'
        ]);

        $floor = Floor::findOrFail($id);
        $floor->update([
            'floor_name' => $request->floor_name,
            'description' => $request->description
        ]);

        return redirect()->route('floors.index')->with('success', 'Floor updated successfully!');
    }

    // Delete floor
    public function destroy($id)
    {
        $floor = Floor::findOrFail($id);
        $floor->delete();

        return redirect()->route('floors.index')->with('success', 'Floor deleted successfully!');
    }
}
