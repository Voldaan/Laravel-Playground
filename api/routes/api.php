<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\CarController;
use App\Http\Controllers\v1\EngineController;
use App\Http\Controllers\v1\AuthController;

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

$car1 = 'v1/cars';

#region Public routes
Route::get($car1, [CarController::class, 'index']);
Route::get("$car1/{id}", [CarController::class, 'show']);
Route::get("$car1/search/{name}", [CarController::class, 'getByName']);

Route::post('v1/register', [AuthController::class, 'register']);

Route::resource('v1/engines', EngineController::class);
Route::get('v2/cars', [App\Http\Controllers\v2\CarController::class, 'index']);
#endregion

#region Protected routes
Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::post('v1/cars', [CarController::class, 'store']);
    Route::post("v1/cars/{id}", [CarController::class, 'update']);
    Route::delete("v1/cars/{id}", [CarController::class, 'destroy']);
});
#endregion