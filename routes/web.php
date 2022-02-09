<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/books', BookController::class)->middleware(['auth']);

Route::resource('/clients',ClientController::class)->middleware(['auth']);

Route::resource('/loans', LoanController::class)->middleware(['auth']);

Route::resource('/states', StateController::class);

Route::get('loans/deliver/{loan}', ['as' => 'loans/deliver', 'uses' => 'App\Http\Controllers\LoanController@deliver']);

require __DIR__.'/auth.php';
