<?php

use App\Http\Controllers\HouseApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/houses', [HouseApiController::class, 'index']);
Route::post('/houses', [HouseApiController::class, 'store']);
Route::get('/houses/{id}', [HouseApiController::class, 'show']);
Route::put('/houses/{id}', [HouseApiController::class, 'update']);
Route::delete('/houses/{id}', [HouseApiController::class, 'destroy']);
