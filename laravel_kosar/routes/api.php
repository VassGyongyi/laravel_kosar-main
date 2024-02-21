<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth.basic')->group(function () {
   

    Route::get('bejelentkezett_kosara', [UserController::class, 'bejelentkezettKosara']);
    Route::get('bejelentkezett_tipus_termek/{id}/{type_id}', [UserController::class, 'bejelentkezettTipusTermek']);
    
    
});
Route::get('baskets', [BasketController::class, 'index']);
Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'store']);
Route::get('baskets/{user_id}/{item_id}', [BasketController::class, 'show']);
Route::post('baskets', [BasketController::class, 'store']);
Route::delete('baskets/{id}', [BasketController::class, 'destroy']);
Route::delete('regi', [BasketController::class, 'regi']);
