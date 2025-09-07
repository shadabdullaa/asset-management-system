<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Department;
use App\Models\AssetMaintenance;
use Carbon\Carbon;

class ReportController extends Controller
{
    // 1. Asset inventory list (all assets by department/floor)
   public function inventory()
{
    $assets = Asset::with(['department.floor', 'category'])->get();
    return view('reports.inventory', compact('assets'));
}
    // 2. Assets with warranty expiring soon (next 30 days)
    public function warrantyExpiring()
    {
        $today = Carbon::today();
        $soon = $today->copy()->addDays(30);
        $assets = Asset::whereBetween('warranty_expiry', [$today, $soon])->get();
        return view('reports.warranty', compact('assets'));
    }

    // 3. Assets currently assigned to each person/department
    public function assignedAssets()
    {
        $assets = Asset::with('department')->where('status', 'in_use')->get();
        return view('reports.assigned', compact('assets'));
    }

    // 4. Maintenance cost report per asset/department
    public function maintenanceCost()
    {
        $costs = AssetMaintenance::with('asset.department')
            ->selectRaw('asset_id, SUM(cost) as total_cost')
            ->groupBy('asset_id')
            ->get();
        return view('reports.maintenance_cost', compact('costs'));
    }

    // 5. Retired assets list
    public function retiredAssets()
    {
        $assets = Asset::where('status', 'retired')->get();
        return view('reports.retired', compact('assets'));
    }
}
