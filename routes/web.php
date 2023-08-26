<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BeritaController;

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

// Route::get('/admin/berita', function () {return view('admin.beranda.berita.index');});
// Route::get('/admin/berita/create', function () {return view('admin.beranda.berita.create');});