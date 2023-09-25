<?php

namespace App\Http\Controllers\Admin\BKAD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;
use App\Http\Requests\DataLembagaRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $item = StrukturOrganisasi::where('type', "bkad")->paginate();

        return view('admin.bkad.struktur-organisasi.index', ['data' => $item]);
    }

    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.bkad.struktur-organisasi.create');
        }

        return view('admin.404');
    }

    public function store(DataLembagaRequest $request)
    {
        $item = StrukturOrganisasi::create([
            'type' => $request->type,
            'foto' => $request->file('foto')->store('BKAD/struktur-organisasi'),
            'deskripsi' => $request->deskripsi,
        ]);

        if($item){
            return redirect('/admin/struktur-organisasi-bkad')->with('success', 'Data struktur organisasi berhasil ditambahkan!');
        } else {
            return redirect('/admin/struktur-organisasi-bkad')->with('danger', 'Data struktur organisasi gagal ditambahkan!');
        }
    }

    public function show($id)
    {
        $item = StrukturOrganisasi::find($id);
    }
    
    public function edit($id)
    {
        $item = StrukturOrganisasi::find($id);

        if(Gate::allows('admin')){
            return view('admin.bkad.struktur-organisasi.edit', compact('item'));
        }
        
        return view('admin.404');
    }
    
    public function updated(DataLembagaRequest $request, $id)
    {
        $item = StrukturOrganisasi::find($id);
        
        if($request->hasFile('foto')){
            if($item->foto != null){
                Storage::delete($item->foto);
            }
            
            $item->update([
                'foto' => $request->file('foto')->store('BKAD/struktur-organisasi'),
                'deskripsi' => $request->deskripsi,
            ]);
            
        } else {
            $item->update([
                'deskripsi' => $request->deskripsi,
            ]);
        }

        if ($item->wasChanged()) {
            return redirect('/admin/struktur-organisasi-bkad')->with('success', 'Data struktur organisasi berhasil diupdate!');
        } else {
            return redirect('/admin/struktur-organisasi-bkad')->with('danger', 'Data struktur organisasi gagal diupdate.');
        }
    }
    
    public function destroy($id)
    {
        $this->authorize('admin');

        $item = StrukturOrganisasi::find($id);

        if($item){
            if($item->foto != null){
                Storage::delete($item->foto);
            }

            $item->delete();
            return redirect('admin/struktur-organisasi-bkad')->with('success', 'Data Struktu Organisasi berhasil dihapus!');
            
        } else {
            return redirect('admin/struktur-organisasi-bkad')->with('danger', 'Data Struktu Organisasi gagal dihapus!');
        }

    }
}
