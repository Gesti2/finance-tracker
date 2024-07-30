<?php

// use App\Models\Transaction;
// use App\Http\Controllers\Api\V1\TransactionController; // added the group below
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to the API',
    ], 200);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::group(['namespace' => 'App\Http\Controllers\Api\V1', 'prefix' => 'v1', 'as' => 'api.v1.'], function () {
    // Route::apiResource('/transactions', TransactionController::class);
    Route::apiResource('transactions', 'TransactionController');
});
