<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaTerbaruController extends Controller
{
    public function index(Request $request)
    {
        $item = Berita::orderBy('created_at', 'DESC')->paginate();
        // ddd($berita);
        return view('welcome', ['data' => $item]);
    }
}
