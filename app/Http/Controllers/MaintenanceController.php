<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $logs = Maintenance::with('asset')->get();
        return view('maintenance.index', compact('logs'));
    }

    public function create()
    {
        $assets = Asset::all();
        return view('maintenance.create', compact('assets'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'maintenance_date' => 'required|date',
            'description' => 'required',
            'cost' => 'required|numeric',
            'performed_by' => 'required',
            'next_due' => 'nullable|date'
        ]);

        Maintenance::create($validated);
        return redirect()->route('maintenance.index')->with('success', 'Maintenance log created successfully');
    }

    public function edit($id)
    {
        $log = Maintenance::findOrFail($id);
        $assets = Asset::all();
        return view('maintenance.edit', compact('log', 'assets'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'maintenance_date' => 'required|date',
            'description' => 'required',
            'cost' => 'required|numeric',
            'performed_by' => 'required',
            'next_due' => 'nullable|date'
        ]);

        $log = Maintenance::findOrFail($id);
        $log->update($validated);
        return redirect()->route('maintenance.index')->with('success', 'Maintenance log updated successfully');
    }

    public function destroy($id)
    {
        $log = Maintenance::findOrFail($id);
        $log->delete();
        return redirect()->route('maintenance.index')->with('success', 'Maintenance log deleted successfully');
    }
}