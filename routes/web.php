<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TwilioSMSController;

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

//Authentication
Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');
Route::get('sendSMS', [TwilioSMSController::class, 'index']);


//Data Barang
Route::GET('barang', [BarangController::class, 'index'])->middleware('auth');
Route::GET('inputbarang', [BarangController::class, 'create'])->middleware('auth');
Route::POST('processinputbarang', [BarangController::class, 'store'])->middleware('auth');
Route::DELETE('deletebarang/{id}', [BarangController::class, 'destroy'])->middleware('auth');
Route::GET('editbarang/{id}', [BarangController::class, 'edit'])->middleware('auth');
Route::PUT('processedit/{id}', [BarangController::class, 'update'])->middleware('auth');

//Peminjaman
Route::GET('peminjaman', [PeminjamanController::class, 'index'])->middleware('auth');
Route::GET('inputpeminjaman', [PeminjamanController::class, 'create'])->middleware('auth');
Route::POST('processinputpeminjaman', [PeminjamanController::class, 'store'])->middleware('auth');
Route::GET('processpeminjaman/{id}', [PeminjamanController::class, 'proces'])->middleware('auth');
Route::PUT('rejectpeminjaman/{id}', [PeminjamanController::class, 'process'])->middleware('auth');
Route::PUT('acceptpeminjaman/{id}', [PeminjamanController::class, 'process'])->middleware('auth');
Route::PUT('processpeminjamans/{id}', [PeminjamanController::class, 'processp'])->middleware('auth');
Route::GET('complete/{id}', [PeminjamanController::class, 'complete'])->middleware('auth');
Route::PUT('completepeminjaman/{id}', [PeminjamanController::class, 'completes'])->middleware('auth');
Route::PUT('cancelpeminjaman/{id}', [PeminjamanController::class, 'process'])->middleware('auth');
Route::DELETE('deletepeminjaman/{id}', [PeminjamanController::class, 'destroy'])->middleware('auth');

//User 
Route::GET('logout', [LogoutController::class, 'logout']);
Route::GET('user', [LogoutController::class, 'user']);
Route::GET('verif', [LogoutController::class, 'verif']);
Route::GET('home', [LogoutController::class, 'index']);