<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\userProfileController;
use App\Http\Controllers\saldoController;

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
    return view('vIndex');
});

// Route::get('/home', function () {
//     return view('vHome');
// })->middleware(['auth'])->name('home');

Route::get('/home',[homeController::class, 'index'])->middleware(['auth'])->name('home');
Route::get('/profile',[userProfileController::class, 'index'])->middleware(['auth'])->name('profile');
Route::get('/saldo',[saldoController::class, 'index'])->middleware(['auth'])->name('saldo');
Route::post('/saldo/insert',[saldoController::class, 'insertSaldo'])->middleware(['auth'])->name('saldo');

require __DIR__.'/auth.php';
