<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;

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
// Route::get('/admin/login', function () {return view('admin.login.login');});
Route::get('/admin/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth' => 'check'])->group(function () {
    Route::get('/admin/dashboard', function () {return view('admin.dashboard');});
    Route::get('/admin/account', [UserController::class, 'index']);
    Route::get('/admin/account/create', [UserController::class, 'create']);
    Route::post('/admin/account', [UserController::class, 'store']);
    Route::get('/admin/account/{id}/edit', [UserController::class, 'edit']);
    Route::patch('/admin/account/{id}', [UserController::class, 'updated']);
    Route::delete('/admin/account/{id}', [UserController::class, 'destroy']);
});



// Route::get('/admin/account', function () {return view('admin.account.index');});
// Route::get('/admin/create', function () {return view('admin.account.create');});
// Route::get('/admin/berita', function () {return view('admin.beranda.berita.index');});