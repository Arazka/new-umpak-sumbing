<?php

namespace App\Http\Controllers\Admin\Regulasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regulasi;
use App\Http\Requests\RegulasiRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class RegulasiController extends Controller
{
    public function index()
    {
        $regulasi = Regulasi::paginate(3);

        return view('admin.regulasi.index', ['data' => $regulasi]);
    }

    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.regulasi.create');
        }

        return view('admin.404');
    }

    public function store(RegulasiRequest $request)
    {
        $regulasi = Regulasi::create([
            'foto' => $request->file('foto')->store('regulasi'),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        if($regulasi){
            return redirect('/admin/regulasi')->with('success', 'Data regulasi berhasil ditambahkan!');
        } else {
            return redirect('/admin/regulasi')->with('danger', 'Data regulasi gagal ditambahkan!');
        }
    }

    public function show($id)
    {
        $regulasi = Regulasi::find($id);
    }

    public function edit($id)
    {
        $regulasi = Regulasi::find($id);

        if(Gate::allows('admin')){
            return view('admin.regulasi.edit', compact('regulasi'));
        }

        return view('admin.404');
    }

    public function updated (RegulasiRequest $request, $id)
    {
        $regulasi = Regulasi::find($id);

        if($request->hasFile('foto')){
            if($regulasi->foto != null){
                Storage::delete($regulasi->foto);
            }

            $regulasi->update([
                'foto' => $request->file('foto')->store('regulasi'),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            $regulasi->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        if($regulasi->wasChanged()){
            return redirect('/admin/regulasi')->with('success','Data regulasi berhasil diupdate!');
        } else {
            return redirect('/admin/regulasi')->with('danger','Data regulasi gagal diupdate!');
        }
    }

    public function destroy($id)
    {
        $regulasi = Regulasi::find($id);

        if($regulasi){
            if($regulasi->foto != null){
                Storage::delete($regulasi->foto);
            }

            $regulasi->delete();
            return redirect('/admin/regulasi')->with('success', 'Data regulasi berhasil dihapus!');

        } else {
            return redirect('/admin/regulasi')->with('danger', 'Data regulasi gagal dihapus!');
        }
    }
}
