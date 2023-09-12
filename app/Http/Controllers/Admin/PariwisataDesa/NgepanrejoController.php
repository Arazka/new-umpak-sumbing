<?php

namespace App\Http\Controllers\Admin\PariwisataDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PariwisataDesa;
use App\Models\Desa;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class NgepanrejoController extends Controller
{
    public function index(Request $request)
    {
        $ngepanrejo = PariwisataDesa::join('desas','desas.id', '=', 'pariwisata_desas.desa_id')
                                    ->where('desas.nama_desa', '=', "Desa Ngepanrejo")
                                    ->select([
                                        'pariwisata_desas.id',
                                        'pariwisata_desas.foto',
                                        'pariwisata_desas.nama_wisata',
                                        'pariwisata_desas.deskripsi',
                                    ])
                                    ->orderBy('pariwisata_desas.created_at', 'DESC')
                                    ->paginate(3);

        return view('admin.pariwisata.pariwisataDesa.ngepanrejo.index', ['data' => $ngepanrejo]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $ngepanrejo = PariwisataDesa::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.pariwisataDesa.ngepanrejo.view', ['data' => $ngepanrejo]);
    }

    public function create()
    {
        $desa = Desa::all();
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.ngepanrejo.create', compact('desa'));
        }
    
        return view('admin.404');

    }

    public function store(WisataRequest $request)
    {
        $this->authorize('admin');

        $ngepanrejo = PariwisataDesa::create([
            'desa_id' => $request->desa_id,
            'foto' => $request->file('foto')->store('pariwisata_desa'),
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($ngepanrejo) {
            return redirect('/admin/wisata-ngepanrejo')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-ngepanrejo')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $ngepanrejo = PariwisataDesa::find($id);
    }

    public function edit($id)
    {
        $desa = Desa::all();
        $ngepanrejo = PariwisataDesa::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.ngepanrejo.edit', compact('ngepanrejo', 'desa'));
        }
    
        return view('admin.404');

    }

    public function updated(WisataRequest $request, $id)
    {
        $this->authorize('admin');

        $ngepanrejo = PariwisataDesa::find($id);

        if ($request->hasFile('foto')) {
            if ($ngepanrejo->foto != null) {
                Storage::delete($ngepanrejo->foto);
            }
            
            $ngepanrejo->update([
                'foto' => $request->file('foto')->store('pariwisata_desa'),
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            $ngepanrejo->update([
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($ngepanrejo->wasChanged()) {
            return redirect('/admin/wisata-ngepanrejo')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-ngepanrejo')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $ngepanrejo = PariwisataDesa::find($id);

        if($ngepanrejo) {
            if($ngepanrejo->foto != null) {
                Storage::delete($ngepanrejo->foto);
            }

            $ngepanrejo->delete();
            return redirect('/admin/wisata-ngepanrejo')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-ngepanrejo')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
