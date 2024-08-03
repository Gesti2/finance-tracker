<?php

use App\Http\Controllers\Api\V1\TransactionController;
use App\Http\Controllers\Api\V1\CategoryController;

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to the API',
    ], 200);
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



Route::group(['namespace' => 'App\Http\Controllers\Api\V1', 'prefix' => 'v1', 'as' => 'api.v1.'], function () {
    Route::post('/register', [AuthController::class, 'register']);


    Route::apiResource('transactions', TransactionController::class)->only(['index', 'store', 'update']);

    Route::get('/transactions/{id}', [TransactionController::class, 'show']);
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);


    Route::apiResource('categories', CategoryController::class)->only(['index', 'store', 'update']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout']);

        Route::get('/user', [AuthController::class, 'user']);
    });
});
