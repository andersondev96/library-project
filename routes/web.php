<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\UserPermissionController;
use App\Http\Controllers\UserController;

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

Route::resource('/permissions', UserPermissionController::class)->middleware(['auth']);

Route::resource('/fines', FineController::class)->middleware(['auth']);

Route::get('/fines/payment/{client}', ['as' => '/fines/payment', 'uses' => 'App\Http\Controllers\FineController@payment'])->middleware(['auth']);

Route::get('loans/deliver/{loan}', ['as' => 'loans/deliver', 'uses' => 'App\Http\Controllers\LoanController@deliver']);

Route::put('loans/finishDeliver/{loan}', ['as' => 'loans/finishDeliver', 'uses' => 'App\Http\Controllers\LoanController@finishDeliver']);

Route::resource('/users', UserController::class)->middleware(['auth']);
require __DIR__.'/auth.php';