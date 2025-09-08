<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getDepartmentsByFloor(Floor $floor)
    {
        // Return the departments for the given floor, ordered by name.
        return response()->json($floor->departments()->orderBy('department_name')->get());
    }
}