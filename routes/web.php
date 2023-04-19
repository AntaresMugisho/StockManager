<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OrderCartController;

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
    return view('dashboard.index');
})->name("dashboard.index");

Route::prefix("dashboard")->group(function(){
    // Manage Articles
    Route::resource("/article", ArticleController::class)->except("show");
    
    // Manage Suppliers
    Route::resource("/supplier", SupplierController::class);
    
    // Manage Customers
    Route::resource("/client", ClientController::class);
    
    // Manage Orders
    Route::resource("/order", OrderController::class);
    
    // Manage Order Cart
    Route::resource("order/cart", OrderCartController::class);
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
