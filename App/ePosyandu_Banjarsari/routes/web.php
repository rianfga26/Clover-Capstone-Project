<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/jadwal', [App\Http\Controllers\JadwalController::class, 'index'])->name('jadwal');
Route::get('/dusunposyandu', [App\Http\Controllers\DusunposyanduController::class, 'index'])->name('dusunposyandu');
Route::get('/posyandu', [App\Http\Controllers\PosyanduController::class, 'index'])->name('posyandu');
Route::get('/dokumentasimaster', [App\Http\Controllers\DokumentasimasterController::class, 'index'])->name('dokumentasimaster');
Route::get('/dokumentasi', [App\Http\Controllers\DokumentasisController::class, 'index'])->name('dokumentasi');
