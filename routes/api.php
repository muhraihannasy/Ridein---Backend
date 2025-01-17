<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Api\Admin\BrandCarController;
use App\Http\Controllers\Api\Admin\CarsController;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::resource('cars', CarsController::class);

Route::group(
    [

        'middleware' => 'api',
        'prefix' => 'brand-cars'

    ],
    function ($router) {
        Route::get('', [BrandCarController::class, 'index']);
        Route::get('{uuid}', [BrandCarController::class, 'detail']);
        Route::post('', [BrandCarController::class, 'create']);
        Route::patch('{uuid}', [BrandCarController::class, 'update']);
        Route::delete('{uuid}', [BrandCarController::class, 'delete']);
    }
);
