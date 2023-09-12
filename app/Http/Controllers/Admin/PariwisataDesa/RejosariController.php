<?php

namespace App\Http\Controllers\Admin\PariwisataDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PariwisataDesa;
use App\Models\Desa;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class RejosariController extends Controller
{
    public function index(Request $request)
    {
        $rejosari = PariwisataDesa::join('desas','desas.id', '=', 'pariwisata_desas.desa_id')
                                    ->where('desas.nama_desa', '=', "Desa Rejosari")
                                    ->select([
                                        'pariwisata_desas.id',
                                        'pariwisata_desas.foto',
                                        'pariwisata_desas.nama_wisata',
                                        'pariwisata_desas.deskripsi',
                                    ])
                                    ->orderBy('pariwisata_desas.created_at', 'DESC')
                                    ->paginate(3);

        return view('admin.pariwisata.pariwisataDesa.rejosari.index', ['data' => $rejosari]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $rejosari = PariwisataDesa::orderBy('created_at','ASC')->paginate();

        return view('admin.pariwisata.pariwisataDesa.rejosari.view', ['data' => $rejosari]);
    }

    public function create()
    {
        $desa = Desa::all();
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.rejosari.create', compact('desa'));
        }
    
        return view('admin.404');
    }

    public function store(WisataRequest $request)
    {
        $this->authorize('admin');

        $rejosari = PariwisataDesa::create([
            'desa_id' => $request->desa_id,
            'foto' => $request->file('foto')->store('pariwisata_desa'),
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($rejosari) {
            return redirect('/admin/wisata-rejosari')->with('success', 'Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-rejosari')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }


    public function show($id)
    {
        $rejosari = PariwisataDesa::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');

        $rejosari = PariwisataDesa::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.rejosari.edit', compact('rejosari'));
        }
    
        return view('admin.404');

    }

    public function updated(WisataRequest $request, $id)
    {
        $this->authorize('admin');

        $rejosari = PariwisataDesa::find($id);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($rejosari->foto != null) {
                Storage::delete($rejosari->foto);
            }
            
            $rejosari->update([
                'foto' => $request->file('foto')->store('pariwisata_desa'),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            // Jika tidak ada file baru yang diunggah, hanya update data lainnya
            $rejosari->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($rejosari->wasChanged()) {
            return redirect('/admin/wisata-rejosari')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-rejosari')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $rejosari = PariwisataDesa::find($id);

        if($rejosari) {
            if($rejosari->foto != null) {
                Storage::delete($rejosari->foto);
            }

            $rejosari->delete();
            return redirect('/admin/wisata-rejosari')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-rejosari')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
