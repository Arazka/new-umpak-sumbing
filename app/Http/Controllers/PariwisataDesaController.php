<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\PariwisataDesa;

class PariwisataDesaController extends Controller
{
    public function desa()
    {
        $desa = Desa::paginate();

        return view('pariwisataDesa.desa', ['data' => $desa]);
    }

    public function pariwisata($nama_desa)
    {       
        $pariwisata_id = Desa::where('nama_desa', $nama_desa)->first();

        $pariwisata = Desa::join('pariwisata_desas','desa_id','=','desas.id')
                            ->where('desas.nama_desa', $pariwisata_id->nama_desa)
                            ->select([
                                'desas.foto as desa_foto',
                                'desas.nama_desa',
                                'desas.sejarah',
                                'desas.foto_kawasan',
                                'pariwisata_desas.foto as pariwisata_foto',
                                'pariwisata_desas.nama_wisata',
                                'pariwisata_desas.deskripsi',
                            ])->get();
    
        return view('pariwisataDesa.pariwisata', ['data' => $pariwisata]);
    }

    
}
