<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ecommerceAPI;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Api\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login',[LoginController::class,'login']);
//Route::apiResource('products', ProductController::class);




// Grupo de rutas para los usuarios con el rol "customer"
Route::middleware(['auth:sanctum', 'customer'])->prefix('customer')->name('customer.')->group(function () {

    Route::get('dashboard', function () {
        return response()->json(['role' => 'customer']);
    });

    //Route::view('/', 'customer.dashboard')->name('dashboard');

    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

    Route::apiResource('orders', OrderController::class)->except(['edit', 'update']);
    Route::apiResource('categories', CategoryController::class)->except(['edit', 'update']);
});

// Grupo de rutas para los usuarios con el rol "admin"
Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', function () {
        return response()->json(['role' => 'admin']);
    });

    //Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::apiResource('users', UserController::class);
    Route::patch('users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');

    Route::apiResource('products', ProductController::class);
    Route::patch('products/{product}/restore', [ProductController::class, 'restore'])->name('products.restore');

    Route::apiResource('categories', CategoryController::class);
    Route::patch('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

    Route::apiResource('orders', OrderController::class);
    Route::patch('orders/{order}/restore', [OrderController::class, 'restore'])->name('orders.restore');
});
