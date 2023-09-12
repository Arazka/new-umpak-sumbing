<?php

namespace App\Http\Controllers\Admin\PariwisataDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PariwisataDesa;
use App\Models\Desa;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class KalegenController extends Controller
{
    public function index(Request $request)
    {
        $kalegen = PariwisataDesa::join('desas','desas.id', '=', 'pariwisata_desas.desa_id')
                                    ->where('desas.nama_desa', '=', "Desa Kalegen")
                                    ->select([
                                        'pariwisata_desas.id',
                                        'pariwisata_desas.foto',
                                        'pariwisata_desas.nama_wisata',
                                        'pariwisata_desas.deskripsi',
                                    ])
                                    ->orderBy('pariwisata_desas.created_at', 'DESC')
                                    ->paginate(3);

        return view('admin.pariwisata.pariwisataDesa.kalegen.index', ['data' => $kalegen]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $kalegen = PariwisataDesa::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.pariwisataDesa.kalegen.view', ['data' => $kalegen]);
    }

    public function create()
    {
        $desa = Desa::all();
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.kalegen.create', compact('desa'));
        }
    
        return view('admin.404');

    }

    public function store(WisataRequest $request)
    {
        $this->authorize('admin');

        $kalegen = PariwisataDesa::create([
            'desa_id' => $request->desa_id,
            'foto' => $request->file('foto')->store('pariwisata_desa'),
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($kalegen) {
            return redirect('/admin/wisata-kalegen')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-kalegen')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $kalegen = PariwisataDesa::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');
        $desa = Desa::all();
        $kalegen = PariwisataDesa::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.kalegen.edit', compact('kalegen', 'desa'));
        }
    
        return view('admin.404');

    }

    public function updated(WisataRequest $request, $id)
    {
        $this->authorize('admin');
    
        $kalegen = PariwisataDesa::find($id);

        if ($request->hasFile('foto')) {
            if ($kalegen->foto != null) {
                Storage::delete($kalegen->foto);
            }
            
            $kalegen->update([
                'foto' => $request->file('foto')->store('pariwisata_desa'),
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            $kalegen->update([
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($kalegen->wasChanged()) {
            return redirect('/admin/wisata-kalegen')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-kalegen')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $kalegen = PariwisataDesa::find($id);

        if($kalegen) {
            if($kalegen->foto != null) {
                Storage::delete($kalegen->foto);
            }

            $kalegen->delete();
            return redirect('/admin/wisata-kalegen')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-kalegen')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
