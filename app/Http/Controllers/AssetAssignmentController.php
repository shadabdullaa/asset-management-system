<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class AssetAssignmentController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        $employees = User::all();
        $departments = Department::all();
        $assignments = Asset::whereNotNull('user_id')->with('user')->get();

        return view('assetassignment', compact('assets', 'employees', 'departments', 'assignments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'employee_id' => 'required|exists:users,id',
            'condition' => 'required|string',
            'assignment_date' => 'required|date',
        ]);

        $asset = Asset::find($request->asset_id);
        $employee = User::find($request->employee_id);

        $asset->user_id = $employee->id;
        $asset->condition = $request->condition;
        // It's not clear from the view if assignment_date should be stored.
        // The assets table does not have a date_assign column.
        // I will ignore it for now.

        $asset->save();

        return redirect()->route('assetassignment')->with('success', 'Asset assigned successfully!');
    }
}
