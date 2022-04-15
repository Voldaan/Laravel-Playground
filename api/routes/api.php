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

#region Public routes
//Cars
$car1 = 'v1/cars';
Route::get($car1, [CarController::class, 'index']);
Route::get("$car1/{id}", [CarController::class, 'show']);
Route::get("$car1/search/{name}", [CarController::class, 'getByName']);

//Auth
Route::post('v1/auth/register', [AuthController::class, 'register']);
Route::post('v1/auth/login', [AuthController::class, 'login']);
#endregion

#region Protected routes
Route::middleware('auth:sanctum')->group(function(){
    //Cars
    $car1 = 'v1/cars';
    Route::post($car1, [CarController::class, 'store']);
    Route::post("$car1/{id}", [CarController::class, 'update']);
    Route::delete("$car1/{id}", [CarController::class, 'destroy']);

    //Auth
    Route::post('v1/auth/logout', [AuthController::class, 'logout']);

    //Engines
    Route::resource('v1/engines', EngineController::class);

    //Cars v2
    Route::get('v2/cars', [App\Http\Controllers\v2\CarController::class, 'index']);
});
#endregion