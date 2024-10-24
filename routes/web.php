<?php

use App\Models\dataServer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\dataVmController;
use App\Http\Controllers\dataServerController;
use App\Http\Controllers\serverDataController;
use App\Http\Controllers\dataAplikasiController;

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

// AUTH
Route::get('/login-page',[authController::class,'index'])->name('login-page')->middleware('isTamu');
Route::post('/auth/login',[authController::class,'login'])->middleware('isTamu');
Route::get('/register-page',[authController::class,'register'])->name('register-page')->middleware('isTamu');
Route::post('/auth/register',[authController::class,'create'])->middleware('isTamu');
Route::get('/logout',[authController::class,'logout']);
// DASHBOARD
Route::get('/dashboard',[adminController::class, 'index'])->name('dashboard')->middleware('isLogin');

// DATA VM
Route::resource('data-vm',dataVmController::class)->middleware('isLogin');

// DATA SERVER

Route::resource('server-data',serverDataController::class)->middleware('isLogin');

// DATA APLIKASI

Route::get('/data-aplikasi/{id}/cetak-pdf', [dataAplikasiController::class, 'cetakPdfPerId'])->name('data-aplikasi.cetak-pdf')->middleware('isLogin');
Route::get('data-aplikasi/cetak-pdf', [dataAplikasiController::class, 'cetakPdf'])->name('data-aplikasi.cetak-pdf')->middleware('isLogin');

Route::resource('data-aplikasi',dataAplikasiController::class)->middleware('isLogin');
