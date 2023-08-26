<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BeritaController;

use App\Http\Controllers\BeritaTerbaruController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// ======== Route Admin ======== //
Route::get('/admin/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'login']);

Route::middleware(['auth' => 'check'])->group(function () {
    Route::get('/admin/dashboard', function () {return view('admin.dashboard');});
    Route::post('/logout', [AuthController::class, 'logout']);

    // ===== User =====
    Route::get('/admin/account', [UserController::class, 'index']);
    Route::get('/admin/account/create', [UserController::class, 'create']);
    Route::post('/admin/account', [UserController::class, 'store']);
    Route::get('/admin/account/{id}/edit', [UserController::class, 'edit']);
    Route::patch('/admin/account/{id}', [UserController::class, 'updated']);
    Route::delete('/admin/account/{id}', [UserController::class, 'destroy']);

    // ===== Berita =====
    Route::get('/admin/berita', [BeritaController::class, 'index']);
    Route::get('/admin/berita/create', [BeritaController::class, 'create']);
    Route::post('/admin/berita', [BeritaController::class, 'store']);
    Route::get('/admin/berita/{id}/edit', [BeritaController::class, 'edit']);
    Route::patch('/admin/berita/{id}', [BeritaController::class, 'updated']);
    Route::delete('/admin/berita/{id}', [BeritaController::class, 'destroy']);
});

// Route::get('/', function () {return view('welcome');});
// Route::get('/', [BeritaTerbaruController::class, 'index']);
Route::get('/', [BeritaTerbaruController::class, 'index']);

Route::get('/pariwisata', function () {return view('pariwisata/pariwisata');});
Route::get('/produk-unggulan', function () {return view('produk_unggulan/produk_unggulan');});
// bkad
Route::get('/bkad/profil-lembaga', function () {return view('bkad/profilLembaga');});
Route::get('/bkad/struktur-organisasi', function () {return view('bkad/strukturOrganisasi');});
Route::get('/bkad/program-kerja', function () {return view('bkad/programKerja');});
Route::get('/bkad/rencana-pembangunan-kawasan-pedesaan', function () {return view('bkad/rpkp');});
// budesma
Route::get('/bumdesma/profil-lembaga', function () {return view('bumdesma/profilLembaga');});
Route::get('/bumdesma/struktur-organisasi', function () {return view('bumdesma/strukturOrganisasi');});
Route::get('/bumdesma/program-kerja', function () {return view('bumdesma/programKerja');});
Route::get('/bumdesma/regulasi', function () {return view('bumdesma/regulasi');});
// regulasi
Route::get('/regulasi', function () {return view('regulasi/regulasi');});
// map experimental
Route::get('/experimental', function () {return view('map-experimental/map');});

// detail desa
Route::get('/desa/desa-bandongan', function () {return view('desa/desa_bandongan');});
Route::get('/desa/desa-gandusari', function () {return view('desa/desa_gandusari');});
Route::get('/desa/desa-kalegen', function () {return view('desa/desa_kalegen');});
Route::get('/desa/desa-ngepanrejo', function () {return view('desa/desa_ngepanrejo');});
Route::get('/desa/desa-rejosari', function () {return view('desa/desa_rejosari');});
Route::get('/desa/desa-sidorejo', function () {return view('desa/desa_sidorejo');});
Route::get('/desa/desa-trasan', function () {return view('desa/desa_trasan');});

// Route::get('/admin/berita', function () {return view('admin.beranda.berita.index');});
// Route::get('/admin/berita/create', function () {return view('admin.beranda.berita.create');});