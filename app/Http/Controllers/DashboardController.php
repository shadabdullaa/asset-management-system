<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Department;
use App\Models\Floor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $assetCount = Asset::count();
        $floorCount = Floor::count();
        $categoryCount = Category::count();
        $departmentCount = Department::count();

        return view('dashboard', compact('assetCount', 'floorCount', 'categoryCount', 'departmentCount'));
    }
}
