<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilLembaga;
use App\Models\StrukturOrganisasi;
use App\Models\ProgramKerja;

class BUMDESMAController extends Controller
{
    public function profil()
    {
        $profil = ProfilLembaga::where('type', "bumdesma")->paginate();

        return view('bumdesma.profilLembaga', compact('profil'));
    }

    public function struktur()
    {
        $struktur = StrukturOrganisasi::where('type', "bumdesma")->paginate();

        return view('bumdesma.strukturOrganisasi', compact('struktur'));
    }

    public function proker()
    {
        $proker = ProgramKerja::where('type', "bumdesma")->paginate();

        return view('bumdesma.programKerja', compact('proker'));
    }
}
