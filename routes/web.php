<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FloorController; // <-- Import FloorController
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetMaintenanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\MaintenanceController; // <-- Import MaintenanceController

/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ---------- Floor Routes ----------
    Route::get('/floors', [FloorController::class, 'index'])->name('floors.index');
    Route::get('/floors/create', [FloorController::class, 'create'])->name('floors.create');
    Route::post('/floors/store', [FloorController::class, 'store'])->name('floors.store');
    Route::get('/floors/{id}/edit', [FloorController::class, 'edit'])->name('floors.edit');
    Route::post('/floors/{id}/update', [FloorController::class, 'update'])->name('floors.update');
    Route::get('/floors/{id}/delete', [FloorController::class, 'destroy'])->name('floors.destroy');
    // ---------- Department Routes ----------
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments/store', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::post('/departments/{id}/update', [DepartmentController::class, 'update'])->name('departments.update');
Route::get('/departments/{id}/delete', [DepartmentController::class, 'destroy'])->name('departments.destroy');
// ---------- Category Routes ----------

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');

// ---------- Asset Routes ----------
Route::get('/assets', [AssetController::class, 'index'])->name('assets.index');
Route::get('/assets/create', [AssetController::class, 'create'])->name('assets.create');
Route::post('/assets/store', [AssetController::class, 'store'])->name('assets.store');
Route::get('/assets/{id}/edit', [AssetController::class, 'edit'])->name('assets.edit');
Route::post('/assets/{id}/update', [AssetController::class, 'update'])->name('assets.update');
Route::get('/assets/{id}/delete', [AssetController::class, 'destroy'])->name('assets.destroy');

// ---------- Asset Maintenance Routes ----------
Route::controller(MaintenanceController::class)->group(function () {
    Route::get('/maintenance', 'index')->name('maintenance.index');
    Route::get('/maintenance/create', 'create')->name('maintenance.create');
    Route::post('/maintenance', 'store')->name('maintenance.store');
    Route::get('/maintenance/{id}/edit', 'edit')->name('maintenance.edit');
    Route::put('/maintenance/{id}', 'update')->name('maintenance.update');
    Route::delete('/maintenance/{id}', 'destroy')->name('maintenance.destroy');
});

// ---------- Report Routes ----------
Route::get('/reports/inventory', [ReportController::class, 'inventory'])->name('reports.inventory');
Route::get('/reports/warranty', [ReportController::class, 'warrantyExpiring'])->name('reports.warranty');
Route::get('/reports/assigned', [ReportController::class, 'assignedAssets'])->name('reports.assigned');
Route::get('/reports/maintenance-cost', [ReportController::class, 'maintenanceCost'])->name('reports.maintenance');
Route::get('/reports/retired', [ReportController::class, 'retiredAssets'])->name('reports.retired');

// ---------- API Routes for dynamic content ----------
Route::get('/api/floors/{floor}/departments', [ApiController::class, 'getDepartmentsByFloor'])->name('api.floors.departments');

// ---------- End of Routes ----------


// Show registration form
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Handle registration
Route::post('/register', function (Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:admin,manager,employee',
    ]);

    App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return redirect('/login')->with('success', 'User created successfully!');
});


});

require __DIR__.'/auth.php';
