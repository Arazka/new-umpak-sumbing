<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
// use Carbon\Carbon;

class BeritaTerbaruController extends Controller
{
    public function index(Request $request)
    {
        $item = Berita::orderBy('created_at', 'DESC')->paginate();
        // $last_update = Carbon::parse($berita->created_at)->diffForHumans();

        return view('welcome', ['data' => $item]);
    }
}
