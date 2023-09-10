<?php

namespace App\Http\Controllers\Admin\Beranda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfileUmpakSumbing;
use App\Http\Requests\ProfileUmpakSumbingRequest;
use Illuminate\Support\Facades\Gate;

class ProfileUmpakSumbingController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('admin');
        $profil = ProfileUmpakSumbing::all();

        return view('admin.beranda.profil-umpak-sumbing.index', ['data' => $profil]);
        
    }

    public function create()
    {

        if (Gate::allows('admin')) {
            return view('admin.beranda.profil-umpak-sumbing.create');
        }
    
        return view('admin.404');
        
    }

    public function store(ProfileUmpakSumbingRequest $request)
    {

        $profil = ProfileUmpakSumbing::create([
            'sejarah' => $request->sejarah,
            'misi' => $request->misi,
            'visi' => $request->visi,
        ]);

        // return redirect('admin/dashboard');
        if ($profil) {
            return redirect('/admin/profile-umpak-sumbing')->with('success','Data profil berhasil ditambahkan!');
        } else {
            return redirect('/admin/profile-umpak-sumbing')->with('danger', 'Data profil gagal ditambahkan.');
        }
    }

    public function show($id)
    {
       $profil = ProfileUmpakSumbing::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');
        
        $profil = ProfileUmpakSumbing::find($id);

        if (Gate::allows('admin')) {
            return view('admin.beranda.profil-umpak-sumbing.edit', compact('profil'));
        }
    
        return view('admin.404');
    }

    public function updated(ProfileUmpakSumbingRequest $request, $id)
    {
        $this->authorize('admin');

        $profil = ProfileUmpakSumbing::find($id);

        $profil->update([
            'sejarah' => $request->sejarah,
            'misi' => $request->misi,
            'visi' => $request->visi,
        ]);

        if ($profil) {
            return redirect('/admin/profile-umpak-sumbing')->with('success','Data profil berhasil diupdate!');
        } else {
            return redirect('/admin/profile-umpak-sumbing')->with('danger', 'Data profil gagal diupdate!');
        }
    }

    public function destroy($id)
    {
        $profil = ProfileUmpakSumbing::find($id)->delete();

        if ($profil) {
            return redirect('/admin/profile-umpak-sumbing')->with('success','Data profil berhasil dihapus!');
        } else {
            return redirect('/admin/profile-umpak-sumbing')->with('danger', 'Data profil gagal dihapus!');
        }
    }
}
