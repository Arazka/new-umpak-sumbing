<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Http\Requests\DesaRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class DesaController extends Controller
{
    Public function index(Request $request)
    {
        $desa = Desa::orderBy('created_at', 'ASC')->paginate(3);

        return view('admin.desa.index', ['data' => $desa]);
    }

    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.desa.create');
        }

        return view('admin.404');
    }

    public function store(DesaRequest $request)
    {
        $desa = Desa::create([
            'foto' => $request->file('foto')->store('desa'),
            'nama_desa' => $request->nama_desa,
            'sejarah' => $request->sejarah,
        ]);

        if ($desa) {
            return redirect('/admin/desa')->with('success','Data desa berhasil ditambahkan!');
        } else {
            return redirect('/admin/desa')->with('danger', 'Data desa gagal ditambahkan.');
        }
    }

    public function show($id)
    {
        $desa = Desa::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');
        $desa = Desa::find($id);

        if (Gate::allows('admin')) {
            return view('admin.desa.edit', compact('desa'));
        }
    
        return view('admin.404');
    }

    public function updated (DesaRequest $request, $id)
    {
        $desa = Desa::find($id);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($desa->foto != null) {
                Storage::delete($desa->foto);
            }
            
            $desa->update([
                'foto' => $request->file('foto')->store('desa'),
                'nama_desa' => $request->nama_desa,
                'sejarah' => $request->sejarah,
            ]);
        } else {
            // Jika tidak ada file baru yang diunggah, hanya update data lainnya
            $desa->update([
                'nama_desa' => $request->nama_desa,
                'sejarah' => $request->sejarah,
            ]);
        }
    
        if ($desa->wasChanged()) {
            return redirect('/admin/desa')->with('success', 'Data desa berhasil diupdate!');
        } else {
            return redirect('/admin/desa')->with('danger', 'Data desa gagal diupdate.');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $desa = Desa::find($id);

        if($desa) {
            if($desa->foto != null) {
                Storage::delete($desa->foto);
            }

            $desa->delete();
            return redirect('/admin/desa')->with('success','Data desa berhasil dihapus!');

        } else {
            return redirect('/admin/desa')->with('danger', 'Data desa gagal dihapus.');
        }
    }
}
