<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Desa;
use App\Models\ProfileUmpakSumbing;
// use Carbon\Carbon;

class BerandaController extends Controller
{
    public function index()
    {
        $item = Berita::orderBy('created_at', 'DESC')->paginate();
        $desa = Desa::orderBy('created_at', 'ASC')->paginate();
        $profil = ProfileUmpakSumbing::all();

        return view('welcome', [
            'data' => $item,
            'desas' => $desa,
            'profils' => $profil,
        ]);
    }
}
