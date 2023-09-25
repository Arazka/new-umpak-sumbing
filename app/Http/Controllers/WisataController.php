<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bandongan;
use App\Models\Gandusari;
use App\Models\Kalegen;
use App\Models\Ngepanrejo;
use App\Models\Rejosari;
use App\Models\Sidorejo;
use App\Models\Trasan;
use App\Models\Desa;

class WisataController extends Controller
{
    public function pariwisata()
    {
        $bandongan = Desa::where('nama_desa', 'like', "%Desa Bandongan%")->paginate();
        $gandusari = Desa::where('nama_desa', 'like', "%Desa Gandusari%")->paginate();
        $kalegen = Desa::where('nama_desa', 'like', "%Desa Kalegen%")->paginate();
        $ngepanrejo = Desa::where('nama_desa', 'like', "%Desa Ngepanrejo%")->paginate();
        $rejosari = Desa::where('nama_desa', 'like', "%Desa Rejosari%")->paginate();
        $sidorejo = Desa::where('nama_desa', 'like', "%Desa Sidorejo%")->paginate();
        $trasan = Desa::where('nama_desa', 'like', "%Desa Trasan%")->paginate();

        return view('pariwisata.pariwisata', [
            'bandongans' => $bandongan,
            'gandusaris' => $gandusari,
            'kalegens' => $kalegen,
            'ngepanrejos' => $ngepanrejo,
            'rejosaris' => $rejosari,
            'sidorejos' => $sidorejo,
            'trasans' => $trasan,
        ]);
    }
}
