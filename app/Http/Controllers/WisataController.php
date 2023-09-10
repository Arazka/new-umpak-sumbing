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
    
    public function bandongan()
    {
        $bandongan = Bandongan::orderBy('created_at', 'ASC')->paginate();
        $desabandongan = Desa::where('nama_desa', 'like', "%Desa Bandongan%")->paginate();

        return view('desa.desa_bandongan', [
            'data' => $bandongan,
            'bandongans' => $desabandongan,
        ]);
    }

    public function rejosari()
    {
        $rejosari = Rejosari::orderBy('created_at', 'ASC')->paginate();
        $desarejosari = Desa::where('nama_desa', 'like', "%Desa Rejosari%")->paginate();

        return view('desa.desa_rejosari', [
            'data' => $rejosari,
            'rejosaris' => $desarejosari,
        ]);
    }

    public function gandusari()
    {
        $gandusari = Gandusari::orderBy('created_at', 'ASC')->paginate();
        $desagandursari = Desa::where('nama_desa', 'like', "%Desa Gandusari%")->paginate();

        return view('desa.desa_gandusari', [
            'data' => $gandusari,
            'gandusaris' => $desagandursari,
        ]);
    }

    public function kalegen()
    {
        $kalegen = Kalegen::orderBy('created_at', 'ASC')->paginate();
        $desakalegen = Desa::where('nama_desa', 'like', "%Desa Kalegen%")->paginate();

        return view('desa.desa_kalegen', [
            'data' => $kalegen,
            'kalegens' => $desakalegen,
        ]);
    }

    public function ngepanrejo()
    {
        $ngepanrejo = Ngepanrejo::orderBy('created_at', 'ASC')->paginate();
        $desangepanrejo = Desa::where('nama_desa', 'like', "%Desa Ngepanrejo%")->paginate();

        return view('desa.desa_ngepanrejo', [
            'data' => $ngepanrejo,
            'ngepanrejos' => $desangepanrejo,
        ]);
    }

    public function sidorejo()
    {
        $sidorejo = Sidorejo::orderBy('created_at', 'ASC')->paginate();
        $desasidorejo = Desa::where('nama_desa', 'like', "%Desa Sidorejo%")->paginate();

        return view('desa.desa_sidorejo', [
            'data' => $sidorejo,
            'sidorejos' => $desasidorejo,
        ]);
    }

    public function trasan()
    {
        $trasan = Trasan::orderBy('created_at', 'ASC')->paginate();
        $desatrasan = Desa::where('nama_desa', 'like', "%Desa Trasan%")->paginate();

        return view('desa.desa_trasan', [
            'data' => $trasan,
            'trasans' => $desatrasan,
        ]);
    }
}
