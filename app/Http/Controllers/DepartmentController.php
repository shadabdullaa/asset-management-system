<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Floor;

class DepartmentController extends Controller
{
    // Show all departments
    public function index()
    {
        $departments = Department::with('floor')->get(); // get all departments with floor info
        return view('departments.index', compact('departments'));
    }

    // Show form to create a new department
    public function create()
    {
        $floors = Floor::all(); // need floors to choose from
        return view('departments.create', compact('floors'));
    }

    // Save new department
    public function store(Request $request)
    {
        $request->validate([
            'floor_id' => 'required|exists:floors,id',
            'department_name' => 'required|max:100',
            'description' => 'nullable'
        ]);

        Department::create([
            'floor_id' => $request->floor_id,
            'department_name' => $request->department_name,
            'description' => $request->description
        ]);

        return redirect()->route('departments.index')->with('success', 'Department created successfully!');
    }

    // Show form to edit a department
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $floors = Floor::all();
        return view('departments.edit', compact('department','floors'));
    }

    // Update department
    public function update(Request $request, $id)
    {
        $request->validate([
            'floor_id' => 'required|exists:floors,id',
            'department_name' => 'required|max:100',
            'description' => 'nullable'
        ]);

        $department = Department::findOrFail($id);
        $department->update([
            'floor_id' => $request->floor_id,
            'department_name' => $request->department_name,
            'description' => $request->description
        ]);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully!');
    }

    // Delete department
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully!');
    }
}
