<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Department;
use App\Models\Category;

class AssetController extends Controller
{
    // Show all assets
    public function index()
    {
        $assets = Asset::with(['department', 'category'])->get();
        return view('assets.index', compact('assets'));
    }

    // Show form to create a new asset
    public function create()
    {
        $departments = Department::all();
        $categories = Category::all();
        return view('assets.create', compact('departments', 'categories'));
    }

    // Save new asset
    public function store(Request $request)
    {
        $request->validate([
            'asset_name' => 'required|max:150',
            'category_id' => 'required|exists:categories,id',
            'department_id' => 'required|exists:departments,id',
            'manufacturer' => 'nullable|max:100',
            'model' => 'nullable|max:100',
            'serial_number' => 'required|unique:assets,serial_number|max:100',
            'purchase_date' => 'nullable|date',
            'warranty_expiry' => 'nullable|date',
            'cost' => 'nullable|numeric',
            'condition' => 'required|in:new,good,fair,poor',
            'status' => 'required|in:active,in_use,maintenance,retired',
            'location' => 'nullable|max:150',
            'description' => 'nullable',
            'with_whom' => 'nullable|max:150'
        ]);

        Asset::create([
            'asset_name' => $request->asset_name,
            'category_id' => $request->category_id,
            'department_id' => $request->department_id,
            'manufacturer' => $request->manufacturer,
            'model' => $request->model,
            'serial_number' => $request->serial_number,
            'purchase_date' => $request->purchase_date,
            'warranty_expiry' => $request->warranty_expiry,
            'cost' => $request->cost,
            'condition' => $request->condition,
            'status' => $request->status,
            'location' => $request->location,
            'description' => $request->description,
            'with_whom' => $request->with_whom
        ]);

        return redirect()->route('assets.index')->with('success', 'Asset created successfully!');
    }

    // Show form to edit an asset
    public function edit($id)
    {
        $asset = Asset::findOrFail($id);
        $departments = Department::all();
        $categories = Category::all();
        return view('assets.edit', compact('asset', 'departments', 'categories'));
    }

    // Update asset
    public function update(Request $request, $id)
    {
        $request->validate([
            'asset_name' => 'required|max:150',
            'category_id' => 'required|exists:categories,id',
            'department_id' => 'required|exists:departments,id',
            'manufacturer' => 'nullable|max:100',
            'model' => 'nullable|max:100',
            'serial_number' => 'required|unique:assets,serial_number,' . $id . ',id',
            'purchase_date' => 'nullable|date',
            'warranty_expiry' => 'nullable|date',
            'cost' => 'nullable|numeric',
            'condition' => 'required|in:new,good,fair,poor',
            'status' => 'required|in:active,in_use,maintenance,retired',
            'location' => 'nullable|max:150',
            'description' => 'nullable',
            'with_whom' => 'nullable|max:150'
        ]);

        $asset = Asset::findOrFail($id);
        $asset->update($request->all());

        return redirect()->route('assets.index')->with('success', 'Asset updated successfully!');
    }

    // Delete asset
    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return redirect()->route('assets.index')->with('success', 'Asset deleted successfully!');
    }
}