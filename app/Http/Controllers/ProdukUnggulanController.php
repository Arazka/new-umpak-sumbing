<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukUnggulan;

class ProdukUnggulanController extends Controller
{
    public function desa()
    {
        $desa = ProdukUnggulan::where('type', 'Desa')->paginate();

        return view('produk_unggulan.produk_unggulan_desa', ['data' => $desa]);
    }

    public function desaDetail($nama_produk)
    {
        $desa = ProdukUnggulan::where('nama_produk', $nama_produk)
                                ->where('type', 'Desa')->paginate();

        return view('produk_unggulan.halaman_desa', compact('desa'));
    }

    public function kawasan()
    {
        $kawasan = ProdukUnggulan::where('type', 'Kawasan')->paginate();

        return view('produk_unggulan.produk_unggulan_kawasan', ['data' => $kawasan]);
    }

    public function kawasanDetail($nama_produk)
    {
        $kawasan = ProdukUnggulan::where('nama_produk', $nama_produk)
                                ->where('type', 'Kawasan')->paginate();

        return view('produk_unggulan.halaman_kawasan', compact('kawasan'));
    }
}
