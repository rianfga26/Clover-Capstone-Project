<?php

use App\Http\Livewire\AdminDusun;
use App\Http\Livewire\DusunPosyandu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Livewire\PendaftaranAnggota;
use App\Http\Livewire\DokumentasimasterShow;
use App\Http\Livewire\DokumentasiShow;
use App\Http\Livewire\JadwalShow;
use App\Http\Livewire\PosyanduShow;
use App\Http\Controllers\ScheduleController;

use App\Models\Dokumentasimaster;
use App\Models\Dokumentasi;

use App\Models\Schedule; 
use App\Models\T_Posyandu;
use App\Models\T_Dusun;
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


Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/jadwal-kegiatan', [ScheduleController::class, 'index'])->name('jadwal_kegiatan');
Route::get('/jadwal-kegiatan/detail/{judul}', [ScheduleController::class, 'showDetail'])->name('jadwal_kegiatan.detail');

Route::post('/jadwal-kegiatan/filter', [ScheduleController::class, 'getJadwal'])->name('filterJadwal');


Route::get('/dokumentasi', function () {
    $dokumentasimasters = Dokumentasimaster::all();
    return view('dokumentasi', ['dokumentasimasters' => $dokumentasimasters]);
})->name('dokumentasi');

Route::get('/dokumentasi/detail/{judul}', [DokumentasiController::class, 'showDetailDokumentasi'])->name('dokumentasi.detail');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');


//login
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticated']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot.pw')->middleware('guest');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetPasswordEmail'])->name('forgot.pw.post');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'viewResetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'handleFormResetPassword'])->middleware('guest')->name('password.update');;


// Admin Page

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.index')
    ->middleware(['auth', 'checkrole:utama,dusun']);

Route::prefix('admin')->group(function(){
    // Utama middleware
    Route::middleware(['auth', 'checkrole:utama'])->group(function(){
        Route::get('jadwal-kegiatan', JadwalShow::class)->name('admin.jadwal');
        Route::get('kategori/posyandu', PosyanduShow::class)->name('admin.master.posyandu');
        Route::get('kategori/dokumentasi', DokumentasimasterShow::class)->name('admin.master.dokumentasi');
        Route::get('dokumentasi', DokumentasiShow::class)->name('admin.dokumentasi');
        Route::get('dusun', AdminDusun::class)->name('admin.dusun');
        Route::get('dusun-posyandu', DusunPosyandu::class)->name('admin.dusun-posyandu');
    });
    
    // Dusun & Utama middleware
    Route::middleware('auth', 'checkrole:utama,dusun')->group(function(){
        Route::get('pendaftaran-anggota-posyandu', PendaftaranAnggota::class)->name('admin.pendaftaran');  
    });
    
    // Route::get('/admin/dashboard', function () {
    //     return view('admin.index');
    // })->name('admin.index');    
    
});

// Route::get('/admin/jadwal-kegiatan', function () {
//     return view('admin.jadwal-kegiatan');
// })->name('admin.jadwal');

// Route::get('/admin/dokumentasi', function () {
//     return view('admin.dokumentasi');
// })->name('admin.dokumentasi');      

// Admin Master - Page
// Route::get('/admin/kategori/posyandu', function () {
//     return view('admin.master.posyandu');
// })->name('admin.master.posyandu');

// Route::get('/admin/kategori/dokumentasi', function () {
//     return view('admin.master.dokumentasi');
// })->name('admin.master.dokumentasi');

// Auth::routes();