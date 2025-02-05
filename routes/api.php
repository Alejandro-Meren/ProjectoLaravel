<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('clientes', ClienteController::class);
Route::apiResource('servicios', ServicioController::class);
Route::apiResource('citas', CitaController::class);
Route::apiResource('productos', ProductoController::class);


Route::get('/usuarios', [UserController::class, 'index']);