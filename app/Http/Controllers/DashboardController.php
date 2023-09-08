<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $jmlUser = User::count();
        $jmlBerita = Berita::count();

        return view('admin.dashboard', compact('jmlUser', 'jmlBerita'));
    }
}
