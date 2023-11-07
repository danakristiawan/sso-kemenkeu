<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SsoController;
use Illuminate\Support\Facades\Session;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/sso', [SsoController::class, 'sso'])->name('sso');
Route::get('/connect', [SsoController::class, 'connect']);
Route::get('/logout', [SsoController::class, 'logout'])->name('logout')->middleware('auth');

