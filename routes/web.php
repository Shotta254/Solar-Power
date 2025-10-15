<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ShoppingCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteVisitController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Item Routes (for Inventory)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/item/search', [ItemController::class, 'search'])->name('item.search');
    Route::post('/item/find', [ItemController::class, 'find'])->name('item.find');
    Route::resource('item', ItemController::class);
});

// Shopping Cart Routes

Route::middleware(['auth', 'verified'])->group(function () {

   Route::delete('/shoppingCart/remove-item/{id}', [ShoppingCartController::class, 'removeItem'])
    ->name('shoppingCart.remove');

Route::put('/shoppingCart/update/{id}', [ShoppingCartController::class, 'updateItemQuantity'])
    ->name('shoppingCart.updateQuantity');

Route::post('/shoppingCart/add/{id}', [ShoppingCartController::class, 'addItemToCart'])
    ->name('shoppingCart.addItem');

Route::get('/shoppingCart/checkout', [ShoppingCartController::class, 'checkout'])
    ->name('shoppingCart.checkout');

    // resource route
Route::resource('shoppingCart', ShoppingCartController::class)->except(['destroy']);
});

Route::middleware(['auth', 'verified'])->group(function () {
     Route::get('/siteVisits/manage', [SiteVisitController::class, 'manage'])->name('siteVisits.manage');
    Route::get('/siteVisits/assigned', [SiteVisitController::class, 'assigned'])->name('siteVisits.assigned');
    Route::resource('siteVisits', SiteVisitController::class)->only(['index', 'create', 'store']);
});

Route::middleware('auth')->group(function () {
    Route::resource('customers', CustomerController::class);
});

Route::resource('item', ItemController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
