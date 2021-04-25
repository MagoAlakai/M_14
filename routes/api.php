<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaintingController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PassportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Routes de Passport

Route::post('login', [PassportController::class, 'login']);
Route::post('register', [PassportController::class, 'register']);

//Endpoints para la API

//ROUTES SHOPS

//Listar shops
Route::get('shops', [ShopController::class, 'index']);

//Detalles shop
Route::get('shops/{id}', [ShopController::class, 'show']);

//Create shop
Route::post('shops', [ShopController::class, 'store']);

//Update shop
Route::put('shops/{id}', [ShopController::class, 'update']);

//Delete shop
Route::delete('shops/{id}', [ShopController::class, 'delete']);


//ROUTES PAINTINGS

//Listar Paintings general
Route::get('/paintings', [PaintingController::class, 'index_all']);

//Listar Paintings by shop
Route::get('shops/{id}/paintings', [PaintingController::class, 'index']);

//Detalles painting
Route::get('paintings/{id}', [PaintingController::class, 'show']);

//Create painting
Route::post('paintings', [PaintingController::class, 'store']);

//Update painting
Route::put('paintings/{id}', [PaintingController::class, 'update']);

//Delete paintings
Route::delete('paintings/{id}', [PaintingController::class, 'delete']);

//Delete all paintings in a shop
Route::delete('shops/{id}/paintings', [PaintingController::class, 'delete_all']);
