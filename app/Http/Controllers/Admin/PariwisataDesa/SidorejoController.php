<?php

namespace App\Http\Controllers\Admin\PariwisataDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PariwisataDesa;
use App\Models\Desa;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class SidorejoController extends Controller
{
    public function index(Request $request)
    {
        $sidorejo = PariwisataDesa::join('desas','desas.id', '=', 'pariwisata_desas.desa_id')
                                    ->where('desas.nama_desa', '=', "Desa Sidorejo")
                                    ->select([
                                        'pariwisata_desas.id',
                                        'pariwisata_desas.foto',
                                        'pariwisata_desas.nama_wisata',
                                        'pariwisata_desas.deskripsi',
                                    ])
                                    ->orderBy('pariwisata_desas.created_at', 'DESC')
                                    ->paginate(3);

        return view('admin.pariwisata.pariwisataDesa.sidorejo.index', ['data' => $sidorejo]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $sidorejo = PariwisataDesa::orderBy('created_at','ASC')->paginate();

        return view('admin.pariwisata.pariwisataDesa.sidorejo.view', ['data' => $sidorejo]);
    }

    public function create()
    {
        $desa = Desa::all();
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.sidorejo.create', compact('desa'));
        }
    
        return view('admin.404');

    }

    public function store(WisataRequest $request)
    {
        $this->authorize('admin');

        $sidorejo = PariwisataDesa::create([
            'desa_id' => $request->desa_id,
            'foto' => $request->file('foto')->store('pariwisata_desa'),
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($sidorejo) {
            return redirect('/admin/wisata-sidorejo')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-sidorejo')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $sidorejo = PariwisataDesa::find($id);
    }

    public function edit($id)
    {
        $desa = Desa::all();
        $sidorejo = PariwisataDesa::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.sidorejo.edit', compact('sidorejo', 'desa'));
        }
    
        return view('admin.404');

    }

    public function updated(WisataRequest $request, $id)
    {
        $this->authorize('admin');

        $sidorejo = PariwisataDesa::find($id);

        if ($request->hasFile('foto')) {
            if ($sidorejo->foto != null) {
                Storage::delete($sidorejo->foto);
            }
            
            $sidorejo->update([
                'foto' => $request->file('foto')->store('pariwisata_desa'),
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            $sidorejo->update([
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($sidorejo->wasChanged()) {
            return redirect('/admin/wisata-sidorejo')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-sidorejo')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $sidorejo = PariwisataDesa::find($id);

        if($sidorejo) {
            if($sidorejo->foto != null) {
                Storage::delete($sidorejo->foto);
            }

            $sidorejo->delete();
            return redirect('/admin/wisata-sidorejo')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-sidorejo')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
