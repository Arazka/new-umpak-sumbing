<?php

namespace App\Http\Controllers\Admin\PariwisataDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PariwisataDesa;
use App\Models\Desa;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class BandonganController extends Controller
{
    public function index(Request $request)
    {
        $bandongan = PariwisataDesa::join('desas','desas.id', '=', 'pariwisata_desas.desa_id')
                                    ->where('desas.nama_desa', '=', "Desa Bandongan")
                                    ->select([
                                        'pariwisata_desas.id',
                                        'pariwisata_desas.foto',
                                        'pariwisata_desas.nama_wisata',
                                        'pariwisata_desas.deskripsi',
                                    ])
                                    ->orderBy('pariwisata_desas.created_at', 'DESC')
                                    ->paginate(3);

        return view('admin.pariwisata.pariwisataDesa.bandongan.index', ['data' => $bandongan]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $bandongan = PariwisataDesa::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.pariwisataDesa.bandongan.view', ['data' => $bandongan]);
    }

    public function create()
    {
        
        $desa = Desa::all();
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.bandongan.create', compact('desa'));
        }
    
        return view('admin.404');

    }

    public function store(WisataRequest $request)
    {
        $this->authorize('admin');

        $bandongan = PariwisataDesa::create([
            'desa_id' => $request->desa_id,
            'foto' => $request->file('foto')->store('pariwisata_desa'),
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($bandongan) {
            return redirect('/admin/wisata-bandongan')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-bandongan')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $bandongan = PariwisataDesa::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');
        $desa = Desa::all();
        $bandongan = PariwisataDesa::find($id);
        // $bandongan = PariwisataDesa::where('nama_wisata', $nama_wisata)->first();
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.bandongan.edit', compact('bandongan', 'desa'));
        }
    
        return view('admin.404');

    }

    public function updated(WisataRequest $request, $id)
    {
        $this->authorize('admin');

        $bandongan = PariwisataDesa::find($id);
        // $bandongan = PariwisataDesa::where('nama_wisata', $nama_wisata)->first();

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($bandongan->foto != null) {
                Storage::delete($bandongan->foto);
            }
            
            $bandongan->update([
                'foto' => $request->file('foto')->store('pariwisata_desa'),
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            // Jika tidak ada file baru yang diunggah, hanya update data lainnya
            $bandongan->update([
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($bandongan->wasChanged()) {
            return redirect('/admin/wisata-bandongan')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-bandongan')->with('danger', 'Data wisata gagal diupdate.');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $bandongan = PariwisataDesa::find($id);

        if($bandongan) {
            if($bandongan->foto != null) {
                Storage::delete($bandongan->foto);
            }

            $bandongan->delete();
            return redirect('/admin/wisata-bandongan')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-bandongan')->with('danger', 'Data wisata gagal dihapus.');
        }
    }
}
