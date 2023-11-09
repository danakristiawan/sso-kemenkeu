<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SsoController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\DataRekeningController;

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

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create'])->name('register');
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store'])->name('register');
Route::view('/beranda', 'beranda')->name('beranda')->middleware('auth');
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout')->middleware('auth');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login');
Route::get('/data-rekening', [DataRekeningController::class, 'index'])->name('data-rekening')->middleware('auth');