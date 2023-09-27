<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilLembaga;
use App\Models\StrukturOrganisasi;
use App\Models\ProgramKerja;
use App\Models\RpkpBKAD;

class BKADController extends Controller
{
    public function profil()
    {
        $profil = ProfilLembaga::where('type', "bkad")->paginate();

        return view('bkad.profilLembaga', compact('profil'));
    }

    public function struktur()
    {
        $struktur = StrukturOrganisasi::where('type', "bkad")->paginate();

        return view('bkad.strukturOrganisasi', compact('struktur'));
    }

    public function proker()
    {
        $proker = ProgramKerja::where('type', "bkad")->paginate();

        return view('bkad.programKerja', compact('proker'));
    }

    public function rpkp()
    {
        $rpkp = RpkpBKAD::paginate();

        return view('bkad.rpkp', compact('rpkp'));
    }
}
