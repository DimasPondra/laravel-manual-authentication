<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register'])
     ->middleware('guest')
     ->name('view-register');
     
Route::post('/register', [AuthController::class, 'createRegister'])
     ->name('store-register');
      
Route::get('/login', [AuthController::class, 'login'])
     ->middleware('guest')
     ->name('view-login');

Route::post('/login', [AuthController::class, 'authenticate'])
     ->name('store-login');

Route::post('/logout', [AuthController::class, 'logout'])
     ->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
     ->middleware('auth')
     ->name('dashboard');