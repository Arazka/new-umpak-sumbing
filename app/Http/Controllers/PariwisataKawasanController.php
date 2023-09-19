<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kawasan;
use App\Models\PariwisataKawasan;

class PariwisataKawasanController extends Controller
{
    public function kawasan()
    {
        $kawasan = Kawasan::paginate();

        return view('pariwisata.pariwisata-kawasan', ['data' => $kawasan]);
    }

    public function pariwisata($nama_kawasan)
    {       
        $kawasan = Kawasan::where('nama_kawasan', $nama_kawasan)->first();

        $pariwisatas = Kawasan::join('pariwisata_kawasans','kawasan_id','=','kawasans.id')
                            ->where('kawasans.nama_kawasan', $kawasan->nama_kawasan)
                            ->select([
                                'kawasans.foto as foto_kawasan',
                                'pariwisata_kawasans.foto as foto_pariwisata',
                                'pariwisata_kawasans.nama_wisata',
                                'pariwisata_kawasans.deskripsi',
                            ])->paginate();
        
        return view('pariwisata.halaman-kawasan', compact('kawasan', 'pariwisatas'));

    }
}
