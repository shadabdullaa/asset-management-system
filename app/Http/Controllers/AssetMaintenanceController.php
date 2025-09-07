<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetMaintenance;
use App\Models\Asset;

class AssetMaintenanceController extends Controller
{
    // Require authentication for all methods
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of maintenance logs.
     */
    public function index()
    {
        $maintenances = AssetMaintenance::with('asset')->get();
        return view('maintenance.index', compact('maintenances'));
    }

    /**
     * Show the form for creating a new maintenance log.
     */
    public function create()
    {
        $assets = Asset::all();
        return view('maintenance.create', compact('assets'));
    }

    /**
     * Store a newly created maintenance log in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'maintenance_date' => 'required|date',
            'description' => 'nullable|string',
            'cost' => 'nullable|numeric',
            'performed_by' => 'nullable|string|max:100',
            'next_due' => 'nullable|date',
        ]);

        AssetMaintenance::create($request->only([
            'asset_id', 'maintenance_date', 'description', 'cost', 'performed_by', 'next_due'
        ]));

        return redirect()->route('maintenance.index')->with('success', 'Maintenance log added successfully!');
    }

    /**
     * Show the form for editing the specified maintenance log.
     */
    public function edit(AssetMaintenance $maintenance)
    {
        $assets = Asset::all();
        return view('maintenance.edit', compact('maintenance', 'assets'));
    }

    /**
     * Update the specified maintenance log in storage.
     */
    public function update(Request $request, AssetMaintenance $maintenance)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'maintenance_date' => 'required|date',
            'description' => 'nullable|string',
            'cost' => 'nullable|numeric',
            'performed_by' => 'nullable|string|max:100',
            'next_due' => 'nullable|date',
        ]);

        $maintenance->update($request->only([
            'asset_id', 'maintenance_date', 'description', 'cost', 'performed_by', 'next_due'
        ]));

        return redirect()->route('maintenance.index')->with('success', 'Maintenance log updated successfully!');
    }

    /**
     * Remove the specified maintenance log from storage.
     */
    public function destroy(AssetMaintenance $maintenance)
    {
        $maintenance->delete();

        return redirect()->route('maintenance.index')->with('success', 'Maintenance log deleted successfully!');
    }
}
