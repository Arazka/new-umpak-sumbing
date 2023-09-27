<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\User;
use App\Models\Desa;
use App\Models\Kawasan;
use App\Models\Regulasi;
use App\Models\PariwisataDesa;
use App\Models\PariwisataKawasan;
use App\Models\ProdukUnggulan;

class DashboardController extends Controller
{
    public function index()
    {
        $jmlUser = User::paginate();
        $jmlBerita = Berita::paginate();
        $jmlDesa = Desa::paginate();
        $jmlRegulasi = Regulasi::paginate();
        $pariwisatadesa = Desa::Join('pariwisata_desas', 'desas.id', '=', 'pariwisata_desas.desa_id')
                                ->select([
                                    'desas.nama_desa',
                                    PariwisataDesa::raw('COUNT(pariwisata_desas.id) as jml_wisata'),
                                ])
                                ->groupBy('desas.nama_desa')
                                ->get();

        $pariwisatakawasan = Kawasan::leftjoin('pariwisata_kawasans', 'kawasans.id', '=', 'pariwisata_kawasans.kawasan_id')
                                      ->select([
                                        'kawasans.nama_kawasan',
                                        PariwisataKawasan::raw('count(pariwisata_kawasans.id) as wisata_kawasan'),
                                      ])
                                      ->groupBy('kawasans.nama_kawasan')
                                      ->get();

        $produkUnggulan = ProdukUnggulan::select([
                                            'produk_unggulans.type',
                                            ProdukUnggulan::raw('count(produk_unggulans.id) as jml_produk'),
                                            ])
                                            ->groupBy('produk_unggulans.type')
                                            ->get();

        return view('admin.dashboard', compact('jmlUser', 'jmlBerita', 'jmlDesa', 'jmlRegulasi', 'pariwisatadesa', 'pariwisatakawasan', 'produkUnggulan'));
    }
}
