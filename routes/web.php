<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Finance Tracker API',
        'status' => 'running',
        'version' => '1.0.0'
    ]);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    // Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    // Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

    // Route::patch('/transactions', [TransactionController::class, 'update'])->name('transactions.update');
    // Route::delete('/transactions', [TransactionController::class,'delete'])->name('transactions.delete');



    // Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
});



require __DIR__ . '/auth.php';
