<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('books')->group(function () {
        Route::get('/', [App\Http\Controllers\BookController::class, 'index'])->name('books');
        Route::get('/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
    });

    Route::prefix('clients')->group(function () {
        Route::get('/', [App\Http\Controllers\ClientController::class, 'index'])->name('clients');
        Route::get('/create', [App\Http\Controllers\ClientController::class, 'create'])->name('clients.create');
    });

    Route::prefix('loans')->group(function () {
        Route::get('/', [App\Http\Controllers\LoanController::class, 'index'])->name('loans');
        Route::get('/create', [App\Http\Controllers\ClientController::class, 'create'])->name('loans.create');
    });

    Route::prefix('fines')->group(function () {
        Route::get('/', [App\Http\Controllers\FineController::class, 'index'])->name('fines');
        Route::get('/create', [App\Http\Controllers\ClientController::class, 'create'])->name('fines.create');
    });
});



Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
