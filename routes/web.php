<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\OnGridPackageController;
use App\Http\Controllers\JobsiteController;
use Illuminate\Support\Facades\Route;

// Public Welcome page
Route::get('/', function () {
    return view('welcome');
});

//**Inventory Clerk**//
Route::middleware(['auth', 'role:inventory_clerk'])->group(function () {

    // Dashboard
    Route::get('/inventory', function () {
        return view('inventory.dashboard');
    })->name('inventory.dashboard');

    // Manage Inventory page
    Route::get('/inventory/manage', [InventoryItemController::class, 'manage'])
        ->name('inventory-items.manage');

    // CRUD Inventory
    Route::resource('inventory-items', InventoryItemController::class)->except(['show'])->names([
        'index' => 'inventory-items.index',
        'create' => 'inventory-items.create',
        'store' => 'inventory-items.store',
        'edit' => 'inventory-items.edit',
        'update' => 'inventory-items.update',
        'destroy' => 'inventory-items.destroy',
    ]);

    // Manage On-Grid Packages
    Route::get('/packages/manage', [OnGridPackageController::class, 'manage'])
        ->name('packages.manage');

    // Clerk Package CRUD routes
    Route::get('/packages/create', [OnGridPackageController::class, 'create'])
        ->name('packages.create');

    Route::post('/packages', [OnGridPackageController::class, 'store'])
        ->name('packages.store');

    Route::get('/packages/{package}/edit', [OnGridPackageController::class, 'edit'])
        ->name('packages.edit');

    Route::put('/packages/{package}', [OnGridPackageController::class, 'update'])
        ->name('packages.update');

    Route::delete('/packages/{package}', [OnGridPackageController::class, 'destroy'])
        ->name('packages.destroy');
});

//**Technician**//
Route::middleware(['auth', 'role:technician'])->group(function () {
    Route::get('/technician', function () {
        return view('technician.dashboard');
    })->name('technician.dashboard');

    // CRUD Jobsites
    Route::resource('jobsites', JobsiteController::class)->except(['show'])->names([
        'index' => 'jobsites.index',
        'create' => 'jobsites.create',
        'store' => 'jobsites.store',
        'edit' => 'jobsites.edit',
        'update' => 'jobsites.update',
        'destroy' => 'jobsites.destroy',
    ]);
});

// Customer Dashboard (default for all logged-in users)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Customer Packages page
Route::middleware(['auth'])->group(function () {
    // Show all packages (index)
    Route::get('/packages', [OnGridPackageController::class, 'index'])
        ->name('packages.index');

    //Show a single package details
    Route::get('/packages/{package}', [OnGridPackageController::class, 'show'])
        ->name('packages.show');
});

//**Profile routes**/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
