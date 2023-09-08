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

class WisataController extends Controller
{
    public function bandongan()
    {
        $bandongan = Bandongan::orderBy('created_at', 'ASC')->paginate();

        return view('desa.desa_bandongan', ['data' => $bandongan]);
    }

    public function rejosari()
    {
        $rejosari = Rejosari::orderBy('created_at', 'ASC')->paginate();

        return view('desa.desa_rejosari', ['data' => $rejosari]);
    }

    public function gandusari()
    {
        $gandusari = Gandusari::orderBy('created_at', 'ASC')->paginate();

        return view('desa.desa_gandusari', ['data' => $gandusari]);
    }

    public function kalegen()
    {
        $kalegen = Kalegen::orderBy('created_at', 'ASC')->paginate();

        return view('desa.desa_kalegen', ['data' => $kalegen]);
    }

    public function ngepanrejo()
    {
        $ngepanrejo = Ngepanrejo::orderBy('created_at', 'ASC')->paginate();

        return view('desa.desa_ngepanrejo', ['data' => $ngepanrejo]);
    }

    public function sidorejo()
    {
        $sidorejo = Sidorejo::orderBy('created_at', 'ASC')->paginate();

        return view('desa.desa_sidorejo', ['data' => $sidorejo]);
    }

    public function trasan()
    {
        $trasan = Trasan::orderBy('created_at', 'ASC')->paginate();

        return view('desa.desa_trasan', ['data' => $trasan]);
    }
}
