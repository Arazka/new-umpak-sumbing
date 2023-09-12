<?php

namespace App\Http\Controllers\Admin\PariwisataDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PariwisataDesa;
use App\Models\Desa;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class TrasanController extends Controller
{
    public function index(Request $request)
    {
        $trasan = PariwisataDesa::join('desas','desas.id', '=', 'pariwisata_desas.desa_id')
                                    ->where('desas.nama_desa', '=', "Desa Trasan")
                                    ->select([
                                        'pariwisata_desas.id',
                                        'pariwisata_desas.foto',
                                        'pariwisata_desas.nama_wisata',
                                        'pariwisata_desas.deskripsi',
                                    ])
                                    ->orderBy('pariwisata_desas.created_at', 'DESC')
                                    ->paginate(3);

        return view('admin.pariwisata.pariwisataDesa.trasan.index', ['data' => $trasan]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $trasan = PariwisataDesa::orderBy('created_at','ASC')->paginate();

        return view('admin.pariwisata.pariwisataDesa.trasan.view', ['data' => $trasan]);
    }

    public function create()
    {
        $desa = Desa::all();
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.trasan.create', compact('desa'));
        }
    
        return view('admin.404');

    }

    public function store(WisataRequest $request)
    {
        $this->authorize('admin');

        $trasan = PariwisataDesa::create([
            'desa_id' => $request->desa_id,
            'foto' => $request->file('foto')->store('pariwisata_desa'),
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($trasan) {
            return redirect('/admin/wisata-trasan')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-trasan')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $trasan = PariwisataDesa::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');
        $desa = Desa::all();
        $trasan = PariwisataDesa::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.trasan.edit', compact('trasan', 'desa'));
        }
    
        return view('admin.404');

    }

    public function updated(WisataRequest $request, $id)
    {
        $this->authorize('admin');

        $trasan = PariwisataDesa::find($id);

        if ($request->hasFile('foto')) {
            if ($trasan->foto != null) {
                Storage::delete($trasan->foto);
            }
            
            $trasan->update([
                'foto' => $request->file('foto')->store('pariwisata_desa'),
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            $trasan->update([
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($trasan->wasChanged()) {
            return redirect('/admin/wisata-trasan')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-trasan')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $trasan = PariwisataDesa::find($id);

        if($trasan) {
            if($trasan->foto != null) {
                Storage::delete($trasan->foto);
            }

            $trasan->delete();
            return redirect('/admin/wisata-trasan')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-trasan')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
