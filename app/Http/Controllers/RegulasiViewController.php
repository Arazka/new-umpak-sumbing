<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regulasi;

class RegulasiViewController extends Controller
{
    public function index()
    {
        $regulasi = Regulasi::paginate();

        return view('regulasi.regulasi', ['data' => $regulasi]);
    }
}
