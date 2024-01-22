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

// User Page

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/jadwal', [App\Http\Controllers\JadwalController::class, 'index'])->name('jadwal');
Route::get('/dusunposyandu', [App\Http\Controllers\DusunposyanduController::class, 'index'])->name('dusunposyandu');
Route::get('/posyandu', [App\Http\Controllers\PosyanduController::class, 'index'])->name('posyandu');
Route::get('/dokumentasimaster', [App\Http\Controllers\DokumentasimasterController::class, 'index'])->name('dokumentasimaster');
Route::get('/dokumentasi', [App\Http\Controllers\DokumentasisController::class, 'index'])->name('dokumentasi');

Route::get('/jadwal-kegiatan', function () {
    return view('jadwal-kegiatan');
})->name('jadwal_kegiatan');

Route::get('/jadwal-kegiatan/detail/{judul}', function ($judul = null) {
    return view('detail-jadwal-kegiatan', compact('judul'));
})->name('jadwal_kegiatan.detail');

Route::get('/dokumentasi', function () {
    return view('dokumentasi');
})->name('dokumentasi');

Route::get('/dokumentasi/detail/{judul}', function ($judul = null) {
    return view('detail-dokumentasi', compact('judul'));
})->name('dokumentasi.detail');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');


// Admin Page
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('login');

Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.index');    

Route::get('/admin/dusun-posyandu', function () {
    return view('admin.dusun-posyandu');
})->name('admin.dusun-posyandu');

Route::get('/admin/dusun', function () {
    return view('admin.dusun');
})->name('admin.dusun');

Route::get('/admin/jadwal-kegiatan', function () {
    return view('admin.jadwal-kegiatan');
})->name('admin.jadwal');

Route::get('/admin/dokumentasi', function () {
    return view('admin.dokumentasi');
})->name('admin.dokumentasi');    

Route::get('/admin/pendaftaran-anggota-posyandu', function () {
    return view('admin.pendaftaran-anggota');
})->name('admin.pendaftaran');    

// Admin Master - Page
Route::get('/admin/kategori/posyandu', function () {
    return view('admin.master.posyandu');
})->name('admin.master.posyandu');

Route::get('/admin/kategori/dokumentasi', function () {
    return view('admin.master.dokumentasi');
})->name('admin.master.dokumentasi');

