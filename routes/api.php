<?php

use App\Models\Transaction;
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



// Route::group(['namespace' => 'Api\V1', 'prefix' => 'v1', 'as' => 'api.v1.'], function () {
//     Route::get('/transactions', function () {
//         return Transaction::all();
//     });
// });


Route::prefix('v1')->group(function () {
    Route::get('/transactions', function () {
        return Transaction::all();
    });
});

// Route::get('/transactions', function () {
//     return Transaction::all();
// });
