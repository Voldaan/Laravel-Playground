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
Route::group(['prefix' => 'v1/cars'], function(){
    Route::get('', [CarController::class, 'index']);
    Route::get('/{id}', [CarController::class, 'show']);
    Route::get('/search/{name}', [CarController::class, 'getByName']);
});

//Auth
Route::group(['prefix' => 'v1/auth'], function(){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

#endregion

#region Protected routes
Route::middleware('auth:sanctum')->group(function(){
    //Cars
    Route::group(['prefix' => 'v1/cars'], function(){
        Route::post('', [CarController::class, 'store']);
        Route::post('/{id}', [CarController::class, 'update']);
        Route::delete('/{id}', [CarController::class, 'destroy']);
    });
    
    //Auth
    Route::post('v1/auth/logout', [AuthController::class, 'logout']);

    //Engines
    Route::resource('v1/engines', EngineController::class);

    //Cars v2
    Route::get('v2/cars', [App\Http\Controllers\v2\CarController::class, 'index']);
});
#endregion