<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\userProfileController;
use App\Http\Controllers\saldoController;
use App\Http\Controllers\tasksController;
use App\Http\Controllers\createTasksController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\riwayatController;
use App\Http\Controllers\transferController;
use App\Http\Controllers\bayartaskController;

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

// Route::middleware(['auth', 'PageAccess:seller'])->group(function () {
//     Route::resource('seller.produk', ProdukController::class)
//     ->shallow();
// });



Route::middleware(['auth'])->group(function () {
    Route::resource('saldo.tambahSaldo', saldoController::class)->shallow();
    Route::resource('saldo', saldoController::class);
    Route::resource('task.pembayaran', tasksController::class)->shallow();
    Route::resource('profile', userProfileController::class);
    Route::resource('profile.editProfile', userProfileController::class)->shallow();
    Route::resource('transaksi.updateStatus', transaksiController::class)->shallow();
    Route::resource('riwayat.updateStatus', riwayatController::class)->shallow();
    Route::resource('task.add', createTasksController::class)->shallow();
    Route::resource('task.addtask', createTasksController::class)->shallow();
    Route::resource('transfer', transferController::class);
    Route::resource('bayartask', bayartaskController::class);
});



Route::get('/', function () {
    return view('vIndex');
});

Route::get('getHargaTask',[transaksiController::class, 'getHargaTask']);
Route::get('/home', [homeController::class, 'index'])->middleware(['auth'])->name('home');
Route::get('/transaksi', [transaksiController::class, 'index'])->middleware(['auth'])->name('transaksi');
Route::get('/riwayat', [riwayatController::class, 'index'])->middleware(['auth'])->name('riwayat');
Route::post('/riwayat/delete/{id}', [riwayatController::class, 'delete'])->middleware(['auth'])->name('transaksi');
Route::get('/transfer', [transferController::class, 'index'])->middleware(['auth'])->name('transfer');
Route::post('/user/delete/{id}', [homeController::class, 'delete'])->middleware(['auth']);
// Route::get('/home',[homeController::class, 'index'])->middleware(['auth'])->name('home');
// Route::get('/profile',[userProfileController::class, 'index'])->middleware(['auth'])->name('profile');
// Route::get('/saldo',[saldoController::class, 'index'])->middleware(['auth'])->name('saldo');
// Route::post('/saldo/insert',[saldoController::class, 'insertSaldo'])->middleware(['auth'])->name('saldo');

// //Umum
// Route::middleware(['auth'])->group(function () {
//     Route::get('/home', [homeController::class, 'index'])
//         ->name('home');
// });

// //Admin
// Route::middleware(['auth', 'PageAccess:admin'])->group(function () {
//     //ISI
// });

// //Member
// Route::middleware(['auth', 'PageAccess:member'])->group(function () {
//     //ISI
// });


require __DIR__ . '/auth.php';
