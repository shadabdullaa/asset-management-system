<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Department;
use App\Models\Floor;
use App\Models\Category;
use App\Models\AssetMaintenance;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ReportController extends Controller
{
    /**
     * Apply common non-date filters for Asset-based reports.
     */
    private function applyAssetBaseFilters(Builder $query, Request $request): void
    {
        if ($request->filled('floor_id')) {
            $query->whereHas('department', function($q) use ($request) {
                $q->where('floor_id', $request->floor_id);
            });
        }
        
        if ($request->filled('department_id')) {
            $query->where('department_id', $request->department_id);
        }
        
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
    }

    /**
     * Apply common non-date filters for AssetMaintenance-based reports.
     */
    private function applyMaintenanceBaseFilters(Builder $query, Request $request): void
    {
        if ($request->filled('floor_id')) {
            $query->whereHas('asset.department', function($q) use ($request) {
                $q->where('floor_id', $request->floor_id);
            });
        }
        
        if ($request->filled('department_id')) {
            $query->whereHas('asset', function($q) use ($request) {
                $q->where('department_id', $request->department_id);
            });
        }
        
        if ($request->filled('category_id')) {
            $query->whereHas('asset', function($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }
    }

    /**
     * Apply date range filters.
     */
    private function applyDateFilters(Builder $query, Request $request, string $dateColumn): void
    {
        if ($request->filled('from_date')) {
            $query->where($dateColumn, '>=', $request->from_date);
        }
        
        if ($request->filled('to_date')) {
            $query->where($dateColumn, '<=', $request->to_date);
        }
    }

    // 1. Asset inventory list with filters
    public function inventory(Request $request)
    {
        $query = Asset::with(['department.floor', 'category']);
        
        $this->applyAssetBaseFilters($query, $request);
        $this->applyDateFilters($query, $request, 'purchase_date');
        
        $assets = $query->get();
        $floors = Floor::all();
        $departments = Department::all();
        $categories = Category::all();
        
        return view('reports.inventory', compact('assets', 'floors', 'departments', 'categories'));
    }

    // 2. Assets with warranty expiring soon
    public function warrantyExpiring(Request $request)
    {
        $query = Asset::with(['department', 'category']);
        
        $this->applyAssetBaseFilters($query, $request);
        $this->applyDateFilters($query, $request, 'warranty_expiry');
        
        $assets = $query->get();
        $floors = Floor::all();
        $departments = Department::all();
        $categories = Category::all();
        
        return view('reports.warranty', compact('assets', 'floors', 'departments', 'categories'));
    }

    // 3. Assets currently assigned to each person/department
    public function assignedAssets(Request $request)
    {
        $query = Asset::with(['department.floor', 'category'])->whereNotNull('assigned_to');
        
        $this->applyAssetBaseFilters($query, $request);
        $this->applyDateFilters($query, $request, 'assignment_date');
        
        $assets = $query->get();
        $floors = Floor::all();
        $departments = Department::all();
        $categories = Category::all();
        
        return view('reports.assigned', compact('assets', 'floors', 'departments', 'categories'));
    }

    // 4. Maintenance cost report per asset/department
    public function maintenanceCost(Request $request)
    {
        $query = AssetMaintenance::with(['asset.department.floor', 'asset.category']);
        
        $this->applyMaintenanceBaseFilters($query, $request);
        $this->applyDateFilters($query, $request, 'maintenance_date');
        
        $costs = $query->selectRaw('asset_id, SUM(cost) as total_cost')
                       ->groupBy('asset_id')
                       ->get();
        
        $floors = Floor::all();
        $departments = Department::all();
        $categories = Category::all();
        
        return view('reports.maintenance_cost', compact('costs', 'floors', 'departments', 'categories'));
    }

    // 5. Retired assets list
    public function retiredAssets(Request $request)
    {
        $query = Asset::with(['department.floor', 'category'])->where('status', 'retired');
        
        $this->applyAssetBaseFilters($query, $request);
        $this->applyDateFilters($query, $request, 'retirement_date');
        
        $assets = $query->get();
        $floors = Floor::all();
        $departments = Department::all();
        $categories = Category::all();
        
        return view('reports.retired', compact('assets', 'floors', 'departments', 'categories'));
    }
}