<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\AddBalanceController;
use App\Http\Controllers\TransactionHistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware('auth')->get('/profile/transactions', [TransactionHistoryController::class, 'index'])->name('transactions.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/dashboard', [DashboardController::class, 'handleForm'])->name('dashboard.handleForm')->middleware('auth');

// Fallback route
Route::fallback(function () {
    return redirect()->route('welcome');
});

Route::post('/picture-route', [FileUploadController::class, 'store']);

Route::post('/update-balance/{userId}/{operation}', [UserController::class, 'updateBalance'])->name('update.balance');

//Route to the specified token
Route::get('/token:{token}', [TokenController::class, 'getToken']);

Route::get('/onze-team', [TeamController::class, 'show'])->name('team.show');

