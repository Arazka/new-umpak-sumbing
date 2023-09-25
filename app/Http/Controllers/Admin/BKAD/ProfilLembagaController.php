<?php

namespace App\Http\Controllers\Admin\BKAD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilLembaga;
use App\Http\Requests\ProfilLembagaRequest;
use Illuminate\Support\Facades\Gate;

class ProfilLembagaController extends Controller
{
    public function index(Request $request)
    {
        $profil = ProfilLembaga::where('type', "bkad")->paginate();

        return view('admin.bkad.profil-lembaga.index', ['data' => $profil]);
        
    }

    public function create()
    {

        if (Gate::allows('admin')) {
            return view('admin.bkad.profil-lembaga.create');
        }
    
        return view('admin.404');
        
    }

    public function store(ProfilLembagaRequest $request)
    {

        $profil = ProfilLembaga::create([
            'type' => $request->type,
            'sejarah' => $request->sejarah,
            'visi_dan_misi' => $request->visi_dan_misi,
            'tugas_dan_fungsi' => $request->tugas_dan_fungsi,
        ]);

        // return redirect('admin/dashboard');
        if ($profil) {
            return redirect('/admin/profil-lembaga-bkad')->with('success','Data profil lembaga berhasil ditambahkan!');
        } else {
            return redirect('/admin/profil-lembaga-bkad')->with('danger', 'Data profil lembaga gagal ditambahkan.');
        }
    }

    public function show($id)
    {
       $profil = ProfilLembaga::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');
        
        $profil = ProfilLembaga::find($id);

        if (Gate::allows('admin')) {
            return view('admin.bkad.profil-lembaga.edit', compact('profil'));
        }
    
        return view('admin.404');
    }

    public function updated(ProfilLembagaRequest $request, $id)
    {
        $this->authorize('admin');

        $profil = ProfilLembaga::find($id);

        $profil->update([
            'sejarah' => $request->sejarah,
            'visi_dan_misi' => $request->visi_dan_misi,
            'tugas_dan_fungsi' => $request->tugas_dan_fungsi,
        ]);

        if ($profil) {
            return redirect('/admin/profil-lembaga-bkad')->with('success','Data profil lembaga berhasil diupdate!');
        } else {
            return redirect('/admin/profil-lembaga-bkad')->with('danger', 'Data profil lembaga gagal diupdate!');
        }
    }

    public function destroy($id)
    {
        $profil = ProfilLembaga::find($id)->delete();

        if ($profil) {
            return redirect('/admin/profil-lembaga-bkad')->with('success','Data profil lembaga berhasil dihapus!');
        } else {
            return redirect('/admin/profil-lembaga-bkad')->with('danger', 'Data profil lembaga gagal dihapus!');
        }
    }
}
