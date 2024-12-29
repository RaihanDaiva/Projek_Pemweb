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
Route::get('/', function () {
    return redirect()->route('login');
});



//LOGIN
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [\App\Http\Controllers\LoginController::class, 'actionlogin'])->name('actionlogin');

//LOGOUT
Route::get('home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//REGISTER
Route::get('register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('register');
Route::post('register/action', [\App\Http\Controllers\RegisterController::class, 'actionregister'])->name('actionregister');

//ADMIN
Route::get('admin',[\App\Http\Controllers\AdminController::class, 'index'])->middleware('auth')->name('admin.index');
Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//USER atau CUSTOMER
Route::get('/customer/informasi_pasien',[\App\Http\Controllers\UserController::class, 'info'])->middleware('auth')->name('customer.info');
Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//Tabel Pasien
Route::get('admin/pasien',[\App\Http\Controllers\PasienController::class, 'index'])->name('pasien.index')->middleware('auth');
Route::get('admin/pasien/create',[\App\Http\Controllers\PasienController::class, 'create'])->name('pasien.create');
Route::post('admin/pasien/create',[\App\Http\Controllers\PasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/{id}/update', [\App\Http\Controllers\PasienController::class, 'edit'])->name('pasien.edit');
Route::put('/pasien/{id}/update', [\App\Http\Controllers\PasienController::class, 'update'])->name('pasien.update');
Route::delete('/pasien/{id}', [\App\Http\Controllers\PasienController::class, 'destroy'])->name('pasien.destroy');
Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//Tabel Dokter
Route::get('admin/dokter',[\App\Http\Controllers\DokterController::class, 'index'])->name('dokter.index')->middleware('auth');
Route::get('admin/dokter/create',[\App\Http\Controllers\DokterController::class, 'create'])->name('dokter.create');
Route::post('admin/dokter/create',[\App\Http\Controllers\DokterController::class, 'store'])->name('dokter.store');
Route::get('/dokter/{id}/update', [\App\Http\Controllers\DokterController::class, 'edit'])->name('dokter.edit');
Route::put('/dokter/{id}/update', [\App\Http\Controllers\DokterController::class, 'update'])->name('dokter.update');
Route::delete('/dokter/{id}', [\App\Http\Controllers\DokterController::class, 'destroy'])->name('dokter.destroy');
Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//Tabel Perawat
Route::get('admin/perawat',[\App\Http\Controllers\PerawatController::class, 'index'])->name('perawat.index')->middleware('auth');
Route::get('admin/perawat/create',[\App\Http\Controllers\PerawatController::class, 'create'])->name('perawat.create');
Route::post('admin/perawat/create',[\App\Http\Controllers\PerawatController::class, 'store'])->name('perawat.store');
Route::get('/perawat/{id}/update', [\App\Http\Controllers\PerawatController::class, 'edit'])->name('perawat.edit');
Route::put('/perawat/{id}/update', [\App\Http\Controllers\PerawatController::class, 'update'])->name('perawat.update');
Route::delete('/perawat/{id}', [\App\Http\Controllers\PerawatController::class, 'destroy'])->name('perawat.destroy');
Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//Tabel Kasir
Route::get('admin/kasir',[\App\Http\Controllers\KasirController::class, 'index'])->name('kasir.index')->middleware('auth');
Route::get('admin/kasir/create',[\App\Http\Controllers\KasirController::class, 'create'])->name('kasir.create');
Route::post('admin/kasir/create',[\App\Http\Controllers\KasirController::class, 'store'])->name('kasir.store');
Route::get('/kasir/{id}/update', [\App\Http\Controllers\KasirController::class, 'edit'])->name('kasir.edit');
Route::put('/kasir/{id}/update', [\App\Http\Controllers\KasirController::class, 'update'])->name('kasir.update');
Route::delete('/kasir/{id}', [\App\Http\Controllers\KasirController::class, 'destroy'])->name('kasir.destroy');
Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//Tabel Obat
Route::get('admin/obat',[\App\Http\Controllers\ObatController::class, 'index'])->name('obat.index')->middleware('auth');
Route::get('admin/obat/create',[\App\Http\Controllers\ObatController::class, 'create'])->name('obat.create');
Route::post('admin/obat/create',[\App\Http\Controllers\ObatController::class, 'store'])->name('obat.store');
Route::get('/obat/{id}/update', [\App\Http\Controllers\ObatController::class, 'edit'])->name('obat.edit');
Route::put('/obat/{id}/update', [\App\Http\Controllers\ObatController::class, 'update'])->name('obat.update');
Route::delete('/obat/{id}', [\App\Http\Controllers\ObatController::class, 'destroy'])->name('obat.destroy');
Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//Tabel Pembayaran
Route::get('admin/pembayaran',[\App\Http\Controllers\PembayaranController::class, 'index'])->name('pembayaran.index')->middleware('auth');
Route::get('admin/pembayaran/create',[\App\Http\Controllers\PembayaranController::class, 'create'])->name('pembayaran.create');
Route::post('admin/pembayaran/create',[\App\Http\Controllers\PembayaranController::class, 'store'])->name('pembayaran.store');
Route::get('/pembayaran/{id}/update', [\App\Http\Controllers\PembayaranController::class, 'edit'])->name('pembayaran.edit');
Route::put('/pembayaran/{id}/update', [\App\Http\Controllers\PembayaranController::class, 'update'])->name('pembayaran.update');
Route::delete('/pembayaran/{id}', [\App\Http\Controllers\PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
Route::put('pembayaran/{id}/update-status', [\App\Http\Controllers\PembayaranController::class, 'updateStatus'])->name('pembayaran.updateStatus');
Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//Tabel Rekam Medis
Route::get('admin/rekam_medis',[\App\Http\Controllers\RekamMedisController::class, 'index'])->name('rekam_medis.index')->middleware('auth');
Route::get('admin/rekam_medis/create',[\App\Http\Controllers\RekamMedisController::class, 'create'])->name('rekam_medis.create');
Route::post('admin/rekam_medis/create',[\App\Http\Controllers\RekamMedisController::class, 'store'])->name('rekam_medis.store');
Route::get('/rekam_medis/{id}/update', [\App\Http\Controllers\RekamMedisController::class, 'edit'])->name('rekam_medis.edit');
Route::put('/rekam_medis/{id}/update', [\App\Http\Controllers\RekamMedisController::class, 'update'])->name('rekam_medis.update');
Route::delete('/rekam_medis/{id}', [\App\Http\Controllers\RekamMedisController::class, 'destroy'])->name('rekam_medis.destroy');
Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//Tabel User
Route::get('admin/user',[\App\Http\Controllers\UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::get('admin/user/create',[\App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('admin/user/create',[\App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/update', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}/update', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//Tabel Customer
route::get('customer/pembayaran', [\App\Http\Controllers\PembayaranController::class, 'index_customer'])->name('customer.pembayaran');
route::get('customer/rekam_medis', [\App\Http\Controllers\RekamMedisController::class, 'index_rekam_medis'])->name('customer.rekam_medis');
route::get('customer/informasi_pasien', [\App\Http\Controllers\PasienController::class, 'informasi_pasien'])->name('customer.informasi_pasien');