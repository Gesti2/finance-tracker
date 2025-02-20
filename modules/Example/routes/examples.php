<?php

use Illuminate\Support\Facades\Route;

Route::get('/examples', function () {
    return response()->json([
        'message' => 'Welcome to the Example API',
    ], 200);
});