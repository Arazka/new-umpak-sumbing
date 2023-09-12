<?php

namespace App\Http\Controllers\Admin\PariwisataKawasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kawasan;
use App\Models\PariwisataKawasan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PariwisataKawasanRequest;

class WisataAirController extends Controller
{
    public function index()
    {
        $wisataAir = PariwisataKawasan::join('kawasans','kawasans.id','=','pariwisata_kawasans.kawasan_id')
                                        ->where('kawasans.nama_kawasan','=',"Wisata Air")
                                        ->select([
                                            'pariwisata_kawasans.id',
                                            'pariwisata_kawasans.foto',
                                            'pariwisata_kawasans.nama_wisata',
                                            'pariwisata_kawasans.deskripsi',
                                        ])
                                        ->orderBy('pariwisata_kawasans.created_at','DESC')
                                        ->paginate(3);

        return view('admin.pariwisata.pariwisataKawasan.pariwisata.wisata-air.index', ['data' => $wisataAir]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $wisataAir = PariwisataKawasan::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.pariwisataKawasan.pariwisata.wisata-air.view', ['data' => $wisataAir]);
    }

    public function create()
    {
        $kawasan = Kawasan::all();
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataKawasan.pariwisata.wisata-air.create', compact('kawasan'));
        }
    
        return view('admin.404');
    }

    public function store(PariwisataKawasanRequest $request)
    {
        $this->authorize('admin');

        $wisataAir = PariwisataKawasan::create([
            'kawasan_id' => $request->kawasan_id,
            'foto' => $request->file('foto')->store('pariwisata_kawasan'),
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($wisataAir) {
            return redirect('/admin/wisata-kawasan-wisata-air')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-kawasan-wisata-air')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $wisataAir = PariwisataKawasan::find($id);
    }

    public function edit($id)
    {
        $kawasan = Kawasan::all();
        $wisataAir = PariwisataKawasan::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataKawasan.pariwisata.wisata-air.edit', compact('wisataAir', 'kawasan'));
        }
    
        return view('admin.404');

    }

    public function updated(PariwisataKawasanRequest $request, $id)
    {
        $this->authorize('admin');

        $wisataAir = PariwisataKawasan::find($id);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($wisataAir->foto != null) {
                Storage::delete($wisataAir->foto);
            }
            
            $wisataAir->update([
                'foto' => $request->file('foto')->store('pariwisata_kawasan'),
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            // Jika tidak ada file baru yang diunggah, hanya update data lainnya
            $wisataAir->update([
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($wisataAir->wasChanged()) {
            return redirect('/admin/wisata-kawasan-wisata-air')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-kawasan-wisata-air')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $wisataAir = PariwisataKawasan::find($id);

        if($wisataAir) {
            if($wisataAir->foto != null) {
                Storage::delete($wisataAir->foto);
            }

            $wisataAir->delete();
            return redirect('/admin/wisata-kawasan-wisata-air')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-kawasan-wisata-air')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
