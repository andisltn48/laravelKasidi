<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

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
<<<<<<< HEAD
=======
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'check']);

Route::get('/register', [RegisterController::class, 'index']);

Route::get('/home', function(){
    return view('vHome');
>>>>>>> 8a025dde8ca3cd48507e3b7269ea1d880e65a40a
});

// Route::get('/home', function () {
//     return view('vHome');
// })->middleware(['auth'])->name('home');

Route::get('/home',[homeController::class, 'index'])->middleware(['auth'])->name('home');

require __DIR__.'/auth.php';
