<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceOrderController;

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

Route::get('/service_order', [ServiceOrderController::class, 'listarServiceOrder']);
Route::post('/service_order', [ServiceOrderController::class, 'criarServiceOrder']);
Route::put('/service_order/{service_order_id}', [ServiceOrderController::class, 'editarServiceOrder']);
Route::delete('/service_order/{service_order_id}', [ServiceOrderController::class, 'deletarServiceOrder']);

