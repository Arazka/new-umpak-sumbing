<?php

use Illuminate\Support\Facades\Route;

// ===== Admin =====
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DesaController;

use App\Http\Controllers\Admin\Beranda\BeritaController;
use App\Http\Controllers\Admin\Beranda\ProfileUmpakSumbingController;
use App\Http\Controllers\Admin\BKAD\ProfilLembagaController;
use App\Http\Controllers\Admin\BKAD\ProgramKerjaController;
use App\Http\Controllers\Admin\BKAD\RPKPController;
use App\Http\Controllers\Admin\BKAD\StrukturOrganisasiController;
use App\Http\Controllers\Admin\BUMDESMA\ProfilLembagaBumdesmaController;
use App\Http\Controllers\Admin\BUMDESMA\ProgramKerjaBumdesmaController;
use App\Http\Controllers\Admin\BUMDESMA\StrukturOrganisasiBumdesmaController;
use App\Http\Controllers\Admin\PariwisataKawasan\KawasanController;
use App\Http\Controllers\Admin\PariwisataKawasan\AgrowisataController;
use App\Http\Controllers\Admin\PariwisataKawasan\PanoramaController;
use App\Http\Controllers\Admin\PariwisataKawasan\WisataAirController;

use App\Http\Controllers\Admin\PariwisataDesa\BandonganController;
use App\Http\Controllers\Admin\PariwisataDesa\RejosariController;
use App\Http\Controllers\Admin\PariwisataDesa\GandusariController;
use App\Http\Controllers\Admin\PariwisataDesa\KalegenController;
use App\Http\Controllers\Admin\PariwisataDesa\NgepanrejoController;
use App\Http\Controllers\Admin\PariwisataDesa\SidorejoController;
use App\Http\Controllers\Admin\PariwisataDesa\TrasanController;

use App\Http\Controllers\Admin\ProdukUnggulan\ProdukUnggulanDesaController;
use App\Http\Controllers\Admin\ProdukUnggulan\ProdukUnggulanKawasanController;
use App\Http\Controllers\Admin\Regulasi\RegulasiController;
// =================

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BKADController;
use App\Http\Controllers\BUMDESMAController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PariwisataDesaController;
use App\Http\Controllers\PariwisataKawasanController;
// use App\Http\Controllers\GetDesaController;
use App\Http\Controllers\ProdukUnggulanController;
use App\Http\Controllers\RegulasiViewController;

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
    // Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/admin/dashboard', [DashboardController::class, 'pariwisata'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/404', function () {return view('admin.404');});

    // ===== User =====
    Route::name('account')->group(function () {
        Route::get('/admin/account', [UserController::class, 'index']);
        Route::get('/admin/account/create', [UserController::class, 'create']);
        Route::post('/admin/account', [UserController::class, 'store']);
        Route::get('/admin/account/{id}/edit', [UserController::class, 'edit']);
        Route::patch('/admin/account/{id}', [UserController::class, 'updated']);
        Route::delete('/admin/account/{id}', [UserController::class, 'destroy']);
    });

    // ===== Desa =====
    Route::name('desa')->group(function () {
        Route::get('/admin/desa', [DesaController::class, 'index']);
        Route::get('/admin/desa/create', [DesaController::class, 'create']);
        Route::post('/admin/desa', [DesaController::class, 'store']);
        Route::get('/admin/desa/{id}/edit', [DesaController::class, 'edit']);
        Route::patch('/admin/desa/{id}', [DesaController::class, 'updated']);
        Route::delete('/admin/desa/{id}', [DesaController::class, 'destroy']);
    });

    // ===== Profil Umpak Sumbing =====
    Route::name('profile-umpak-sumbing')->group(function () {
        Route::get('/admin/profile-umpak-sumbing', [ProfileUmpakSumbingController::class, 'index']);
        Route::get('/admin/profile-umpak-sumbing/create', [ProfileUmpakSumbingController::class, 'create']);
        Route::post('/admin/profile-umpak-sumbing', [ProfileUmpakSumbingController::class, 'store']);
        Route::get('/admin/profile-umpak-sumbing/{id}/edit', [ProfileUmpakSumbingController::class, 'edit']);
        Route::patch('/admin/profile-umpak-sumbing/{id}', [ProfileUmpakSumbingController::class, 'updated']);
        Route::delete('/admin/profile-umpak-sumbing/{id}', [ProfileUmpakSumbingController::class, 'destroy']);
    });

    // ===== Berita =====
    Route::name('berita')->group(function () {
        Route::get('/admin/berita', [BeritaController::class, 'index']);
        Route::get('/admin/view-berita', [BeritaController::class, 'view']);
        Route::get('/admin/berita/create', [BeritaController::class, 'create']);
        Route::post('/admin/berita', [BeritaController::class, 'store']);
        Route::get('/admin/berita/{id}/edit', [BeritaController::class, 'edit']);
        Route::patch('/admin/berita/{id}', [BeritaController::class, 'updated']);
        Route::delete('/admin/berita/{id}', [BeritaController::class, 'destroy']);
    });

    // ===== bandongan =====
    Route::name('bandongan')->group(function () {
        Route::get('/admin/wisata-bandongan', [BandonganController::class, 'index']);
        Route::get('/admin/view-wisata-bandongan', [BandonganController::class, 'view']);
        Route::get('/admin/wisata-bandongan/create', [BandonganController::class, 'create']);
        Route::post('/admin/wisata-bandongan', [BandonganController::class, 'store']);
        Route::get('/admin/wisata-bandongan/{id}/edit', [BandonganController::class, 'edit']);
        Route::patch('/admin/wisata-bandongan/{id}', [BandonganController::class, 'updated']);
        Route::delete('/admin/wisata-bandongan/{id}', [BandonganController::class, 'destroy']);
    });

    // ===== rejosari =====
    Route::name('rejosari')->group(function () {
        Route::get('/admin/wisata-rejosari', [RejosariController::class, 'index']);
        Route::get('/admin/view-wisata-rejosari', [RejosariController::class, 'view']);
        Route::get('/admin/wisata-rejosari/create', [RejosariController::class, 'create']);
        Route::post('/admin/wisata-rejosari', [RejosariController::class, 'store']);
        Route::get('/admin/wisata-rejosari/{id}/edit', [RejosariController::class, 'edit']);
        Route::patch('/admin/wisata-rejosari/{id}', [RejosariController::class, 'updated']);
        Route::delete('/admin/wisata-rejosari/{id}', [RejosariController::class, 'destroy']);
    });

    // ===== gandusari =====
    Route::name('gandusari')->group(function () {
        Route::get('/admin/wisata-gandusari', [GandusariController::class, 'index']);
        Route::get('/admin/view-wisata-gandusari', [GandusariController::class, 'view']);
        Route::get('/admin/wisata-gandusari/create', [GandusariController::class, 'create']);
        Route::post('/admin/wisata-gandusari', [GandusariController::class, 'store']);
        Route::get('/admin/wisata-gandusari/{id}/edit', [GandusariController::class, 'edit']);
        Route::patch('/admin/wisata-gandusari/{id}', [GandusariController::class, 'updated']);
        Route::delete('/admin/wisata-gandusari/{id}', [GandusariController::class, 'destroy']);
    });

    // ===== kalegen =====
    Route::name('kalegen')->group(function () {
        Route::get('/admin/wisata-kalegen', [KalegenController::class, 'index']);
        Route::get('/admin/view-wisata-kalegen', [KalegenController::class, 'view']);
        Route::get('/admin/wisata-kalegen/create', [KalegenController::class, 'create']);
        Route::post('/admin/wisata-kalegen', [KalegenController::class, 'store']);
        Route::get('/admin/wisata-kalegen/{id}/edit', [KalegenController::class, 'edit']);
        Route::patch('/admin/wisata-kalegen/{id}', [KalegenController::class, 'updated']);
        Route::delete('/admin/wisata-kalegen/{id}', [KalegenController::class, 'destroy']);
    });

    // ===== ngepanrejo =====
    Route::name('ngepanrejo')->group(function () {
        Route::get('/admin/wisata-ngepanrejo', [NgepanrejoController::class, 'index']);
        Route::get('/admin/view-wisata-ngepanrejo', [NgepanrejoController::class, 'view']);
        Route::get('/admin/wisata-ngepanrejo/create', [NgepanrejoController::class, 'create']);
        Route::post('/admin/wisata-ngepanrejo', [NgepanrejoController::class, 'store']);
        Route::get('/admin/wisata-ngepanrejo/{id}/edit', [NgepanrejoController::class, 'edit']);
        Route::patch('/admin/wisata-ngepanrejo/{id}', [NgepanrejoController::class, 'updated']);
        Route::delete('/admin/wisata-ngepanrejo/{id}', [NgepanrejoController::class, 'destroy']);
    });

    // ===== sidorejo =====
    Route::name('sidorejo')->group(function () {
        Route::get('/admin/wisata-sidorejo', [SidorejoController::class, 'index']);
        Route::get('/admin/view-wisata-sidorejo', [SidorejoController::class, 'view']);
        Route::get('/admin/wisata-sidorejo/create', [SidorejoController::class, 'create']);
        Route::post('/admin/wisata-sidorejo', [SidorejoController::class, 'store']);
        Route::get('/admin/wisata-sidorejo/{id}/edit', [SidorejoController::class, 'edit']);
        Route::patch('/admin/wisata-sidorejo/{id}', [SidorejoController::class, 'updated']);
        Route::delete('/admin/wisata-sidorejo/{id}', [SidorejoController::class, 'destroy']);
    });

    // ===== trasan =====
    Route::name('trasan')->group(function () {
        Route::get('/admin/wisata-trasan', [TrasanController::class, 'index']);
        Route::get('/admin/view-wisata-trasan', [TrasanController::class, 'view']);
        Route::get('/admin/wisata-trasan/create', [TrasanController::class, 'create']);
        Route::post('/admin/wisata-trasan', [TrasanController::class, 'store']);
        Route::get('/admin/wisata-trasan/{id}/edit', [TrasanController::class, 'edit']);
        Route::patch('/admin/wisata-trasan/{id}', [TrasanController::class, 'updated']);
        Route::delete('/admin/wisata-trasan/{id}', [TrasanController::class, 'destroy']);
    });

    // ===== data kawasan =====
    Route::name('kawasan')->group(function () {
        Route::get('/admin/kawasan', [KawasanController::class, 'index']);
        Route::get('/admin/view-kawasan', [KawasanController::class, 'view']);
        Route::get('/admin/kawasan/create', [KawasanController::class, 'create']);
        Route::post('/admin/kawasan', [KawasanController::class, 'store']);
        Route::get('/admin/kawasan/{id}/edit', [KawasanController::class, 'edit']);
        Route::patch('/admin/kawasan/{id}', [KawasanController::class, 'updated']);
        Route::delete('/admin/kawasan/{id}', [KawasanController::class, 'destroy']);
    });

    // ===== agrowisata =====
    Route::name('agrowisata')->group(function () {
        Route::get('/admin/wisata-kawasan-agrowisata', [AgrowisataController::class, 'index']);
        Route::get('/admin/view-wisata-kawasan-agrowisata', [AgrowisataController::class, 'view']);
        Route::get('/admin/wisata-kawasan-agrowisata/create', [AgrowisataController::class, 'create']);
        Route::post('/admin/wisata-kawasan-agrowisata', [AgrowisataController::class, 'store']);
        Route::get('/admin/wisata-kawasan-agrowisata/{id}/edit', [AgrowisataController::class, 'edit']);
        Route::patch('/admin/wisata-kawasan-agrowisata/{id}', [AgrowisataController::class, 'updated']);
        Route::delete('/admin/wisata-kawasan-agrowisata/{id}', [AgrowisataController::class, 'destroy']);
    });
    
    // ===== panorama =====
    Route::name('panorama')->group(function () {
        Route::get('/admin/wisata-kawasan-panorama', [PanoramaController::class, 'index']);
        Route::get('/admin/view-wisata-kawasan-panorama', [PanoramaController::class, 'view']);
        Route::get('/admin/wisata-kawasan-panorama/create', [PanoramaController::class, 'create']);
        Route::post('/admin/wisata-kawasan-panorama', [PanoramaController::class, 'store']);
        Route::get('/admin/wisata-kawasan-panorama/{id}/edit', [PanoramaController::class, 'edit']);
        Route::patch('/admin/wisata-kawasan-panorama/{id}', [PanoramaController::class, 'updated']);
        Route::delete('/admin/wisata-kawasan-panorama/{id}', [PanoramaController::class, 'destroy']);
    });
    
    // ===== panorama =====
    Route::name('wisata-air')->group(function () {
        Route::get('/admin/wisata-kawasan-wisata-air', [WisataAirController::class, 'index']);
        Route::get('/admin/view-wisata-kawasan-wisata-air', [WisataAirController::class, 'view']);
        Route::get('/admin/wisata-kawasan-wisata-air/create', [WisataAirController::class, 'create']);
        Route::post('/admin/wisata-kawasan-wisata-air', [WisataAirController::class, 'store']);
        Route::get('/admin/wisata-kawasan-wisata-air/{id}/edit', [WisataAirController::class, 'edit']);
        Route::patch('/admin/wisata-kawasan-wisata-air/{id}', [WisataAirController::class, 'updated']);
        Route::delete('/admin/wisata-kawasan-wisata-air/{id}', [WisataAirController::class, 'destroy']);
    });

    // ===== produk unggulan desa =====
    Route::name('produk-unggulan-desa')->group(function () {
        Route::get('/admin/produk-unggulan-desa', [ProdukUnggulanDesaController::class, 'index']);
        Route::get('/admin/view-produk-unggulan-desa', [ProdukUnggulanDesaController::class, 'view']);
        Route::get('/admin/produk-unggulan-desa/create', [ProdukUnggulanDesaController::class, 'create']);
        Route::post('/admin/produk-unggulan-desa', [ProdukUnggulanDesaController::class, 'store']);
        Route::get('/admin/produk-unggulan-desa/{id}/edit', [ProdukUnggulanDesaController::class, 'edit']);
        Route::patch('/admin/produk-unggulan-desa/{id}', [ProdukUnggulanDesaController::class, 'updated']);
        Route::delete('/admin/produk-unggulan-desa/{id}', [ProdukUnggulanDesaController::class, 'destroy']);
    });

    // ===== produk unggulan kawasan =====
    Route::name('produk-unggulan-kawasan')->group(function () {
        Route::get('/admin/produk-unggulan-kawasan', [ProdukUnggulanKawasanController::class, 'index']);
        Route::get('/admin/view-produk-unggulan-kawasan', [ProdukUnggulanKawasanController::class, 'view']);
        Route::get('/admin/produk-unggulan-kawasan/create', [ProdukUnggulanKawasanController::class, 'create']);
        Route::post('/admin/produk-unggulan-kawasan', [ProdukUnggulanKawasanController::class, 'store']);
        Route::get('/admin/produk-unggulan-kawasan/{id}/edit', [ProdukUnggulanKawasanController::class, 'edit']);
        Route::patch('/admin/produk-unggulan-kawasan/{id}', [ProdukUnggulanKawasanController::class, 'updated']);
        Route::delete('/admin/produk-unggulan-kawasan/{id}', [ProdukUnggulanKawasanController::class, 'destroy']);
    });

    // ===== Profil Lembaga BKAD =====
    Route::name('profil-lembaga-bkad')->group(function () {
        Route::get('/admin/profil-lembaga-bkad', [ProfilLembagaController::class, 'index']);
        Route::get('/admin/view-profil-lembaga-bkad', [ProfilLembagaController::class, 'view']);
        Route::get('/admin/profil-lembaga-bkad/create', [ProfilLembagaController::class, 'create']);
        Route::post('/admin/profil-lembaga-bkad', [ProfilLembagaController::class, 'store']);
        Route::get('/admin/profil-lembaga-bkad/{id}/edit', [ProfilLembagaController::class, 'edit']);
        Route::patch('/admin/profil-lembaga-bkad/{id}', [ProfilLembagaController::class, 'updated']);
        Route::delete('/admin/profil-lembaga-bkad/{id}', [ProfilLembagaController::class, 'destroy']);
    });

    // ===== Struktur Organisasi BKAD =====
    Route::name('struktur-organisasi-bkad')->group(function () {
        Route::get('/admin/struktur-organisasi-bkad', [StrukturOrganisasiController::class, 'index']);
        Route::get('/admin/view-struktur-organisasi-bkad', [StrukturOrganisasiController::class, 'view']);
        Route::get('/admin/struktur-organisasi-bkad/create', [StrukturOrganisasiController::class, 'create']);
        Route::post('/admin/struktur-organisasi-bkad', [StrukturOrganisasiController::class, 'store']);
        Route::get('/admin/struktur-organisasi-bkad/{id}/edit', [StrukturOrganisasiController::class, 'edit']);
        Route::patch('/admin/struktur-organisasi-bkad/{id}', [StrukturOrganisasiController::class, 'updated']);
        Route::delete('/admin/struktur-organisasi-bkad/{id}', [StrukturOrganisasiController::class, 'destroy']);
    });

    // ===== Program Kerja BKAD =====
    Route::name('program-kerja-bkad')->group(function () {
        Route::get('/admin/program-kerja-bkad', [ProgramKerjaController::class, 'index']);
        Route::get('/admin/view-program-kerja-bkad', [ProgramKerjaController::class, 'view']);
        Route::get('/admin/program-kerja-bkad/create', [ProgramKerjaController::class, 'create']);
        Route::post('/admin/program-kerja-bkad', [ProgramKerjaController::class, 'store']);
        Route::get('/admin/program-kerja-bkad/{id}/edit', [ProgramKerjaController::class, 'edit']);
        Route::patch('/admin/program-kerja-bkad/{id}', [ProgramKerjaController::class, 'updated']);
        Route::delete('/admin/program-kerja-bkad/{id}', [ProgramKerjaController::class, 'destroy']);
    });

    // ===== RPKP BKAD =====
    Route::name('rpkp-bkad')->group(function () {
        Route::get('/admin/rpkp-bkad', [RPKPController::class, 'index']);
        Route::get('/admin/view-rpkp-bkad', [RPKPController::class, 'view']);
        Route::get('/admin/rpkp-bkad/create', [RPKPController::class, 'create']);
        Route::post('/admin/rpkp-bkad', [RPKPController::class, 'store']);
        Route::get('/admin/rpkp-bkad/{id}/edit', [RPKPController::class, 'edit']);
        Route::patch('/admin/rpkp-bkad/{id}', [RPKPController::class, 'updated']);
        Route::delete('/admin/rpkp-bkad/{id}', [RPKPController::class, 'destroy']);
    });

    // ===== Profil Lembaga BUMDESMA =====
    Route::name('profil-lembaga-bumdesma')->group(function () {
        Route::get('/admin/profil-lembaga-bumdesma', [ProfilLembagaBumdesmaController::class, 'index']);
        Route::get('/admin/view-profil-lembaga-bumdesma', [ProfilLembagaBumdesmaController::class, 'view']);
        Route::get('/admin/profil-lembaga-bumdesma/create', [ProfilLembagaBumdesmaController::class, 'create']);
        Route::post('/admin/profil-lembaga-bumdesma', [ProfilLembagaBumdesmaController::class, 'store']);
        Route::get('/admin/profil-lembaga-bumdesma/{id}/edit', [ProfilLembagaBumdesmaController::class, 'edit']);
        Route::patch('/admin/profil-lembaga-bumdesma/{id}', [ProfilLembagaBumdesmaController::class, 'updated']);
        Route::delete('/admin/profil-lembaga-bumdesma/{id}', [ProfilLembagaBumdesmaController::class, 'destroy']);
    });

    // ===== Struktur Organisasi BUMDESMA =====
    Route::name('struktur-organisasi-bumdesma')->group(function () {
        Route::get('/admin/struktur-organisasi-bumdesma', [StrukturOrganisasiBumdesmaController::class, 'index']);
        Route::get('/admin/view-struktur-organisasi-bumdesma', [StrukturOrganisasiBumdesmaController::class, 'view']);
        Route::get('/admin/struktur-organisasi-bumdesma/create', [StrukturOrganisasiBumdesmaController::class, 'create']);
        Route::post('/admin/struktur-organisasi-bumdesma', [StrukturOrganisasiBumdesmaController::class, 'store']);
        Route::get('/admin/struktur-organisasi-bumdesma/{id}/edit', [StrukturOrganisasiBumdesmaController::class, 'edit']);
        Route::patch('/admin/struktur-organisasi-bumdesma/{id}', [StrukturOrganisasiBumdesmaController::class, 'updated']);
        Route::delete('/admin/struktur-organisasi-bumdesma/{id}', [StrukturOrganisasiBumdesmaController::class, 'destroy']);
    });

    // ===== Program Kerja BUMDESMA =====
    Route::name('program-kerja-bumdesma')->group(function () {
        Route::get('/admin/program-kerja-bumdesma', [ProgramKerjaBumdesmaController::class, 'index']);
        Route::get('/admin/view-program-kerja-bumdesma', [ProgramKerjaBumdesmaController::class, 'view']);
        Route::get('/admin/program-kerja-bumdesma/create', [ProgramKerjaBumdesmaController::class, 'create']);
        Route::post('/admin/program-kerja-bumdesma', [ProgramKerjaBumdesmaController::class, 'store']);
        Route::get('/admin/program-kerja-bumdesma/{id}/edit', [ProgramKerjaBumdesmaController::class, 'edit']);
        Route::patch('/admin/program-kerja-bumdesma/{id}', [ProgramKerjaBumdesmaController::class, 'updated']);
        Route::delete('/admin/program-kerja-bumdesma/{id}', [ProgramKerjaBumdesmaController::class, 'destroy']);
    });

    // ===== Regulasi =====
    Route::name('regulasi')->group(function () {
        Route::get('/admin/regulasi', [RegulasiController::class, 'index']);
        Route::get('/admin/view-regulasi', [RegulasiController::class, 'view']);
        Route::get('/admin/regulasi/create', [RegulasiController::class, 'create']);
        Route::post('/admin/regulasi', [RegulasiController::class, 'store']);
        Route::get('/admin/regulasi/{id}/edit', [RegulasiController::class, 'edit']);
        Route::patch('/admin/regulasi/{id}', [RegulasiController::class, 'updated']);
        Route::delete('/admin/regulasi/{id}', [RegulasiController::class, 'destroy']);
    });
});

Route::middleware(['guest'])->group(function () {

        // ===== Home/Beranda =====
        Route::get('/', [BerandaController::class, 'index']);

        // ===== Pariwisata =====
        // Route::get('/pariwisata', function () {return view('pariwisata/pariwisata');});
        Route::get('/pariwisata-desa', [PariwisataDesaController::class, 'desa']);
        Route::get('/pariwisata-kawasan', [PariwisataKawasanController::class, 'kawasan']);
        Route::get('/pariwisata-desa/{nama_desa}', [PariwisataDesaController::class, 'pariwisata']);
        Route::get('/pariwisata-kawasan/{nama_kawasan}', [PariwisataKawasanController::class, 'pariwisata']);
        // Route::get('/pariwisata-kawasan/{nama_kawasan}', [PariwisataKawasanController::class, 'pariwisata']);

        // produk unggulan
        // Route::get('/produk-unggulan-desa', function () {return view('produk_unggulan/produk_unggulan_desa');});
        Route::get('/produk-unggulan-desa', [ProdukUnggulanController::class, 'desa']);
        Route::get('/produk-unggulan-kawasan', [ProdukUnggulanController::class, 'kawasan']);
        Route::get('/produk-unggulan-desa/{nama_produk}', [ProdukUnggulanController::class, 'desaDetail']);
        Route::get('/produk-unggulan-kawasan/{nama_produk}', [ProdukUnggulanController::class, 'kawasanDetail']);

        // bkad
        Route::get('/bkad/profil-lembaga', [BKADController::class, 'profil']);
        Route::get('/bkad/struktur-organisasi', [BKADController::class, 'struktur']);
        Route::get('/bkad/program-kerja', [BKADController::class, 'proker']);
        Route::get('/bkad/rencana-pembangunan-kawasan-pedesaan', [BKADController::class, 'rpkp']);
        
        // budesma
        Route::get('/bumdesma/profil-lembaga', [BUMDESMAController::class, 'profil']);
        Route::get('/bumdesma/struktur-organisasi', [BUMDESMAController::class, 'struktur']);
        Route::get('/bumdesma/program-kerja', [BUMDESMAController::class, 'proker']);

        // regulasi
        Route::get('/regulasi', [RegulasiViewController::class, 'index']);
        // Route::get('/regulasi', function () {return view('regulasi/regulasi');});

        // map experimental
        Route::get('/experimental', function () {return view('map-experimental/map');});
});
// Route::get('/admin/berita', function () {return view('admin.beranda.berita.index');});
// Route::get('/admin/berita/create', function () {return view('admin.beranda.berita.create');});