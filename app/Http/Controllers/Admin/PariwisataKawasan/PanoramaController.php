<?php

namespace App\Http\Controllers\Admin\PariwisataKawasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Panorama;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PariwisataKawasanRequest;


class PanoramaController extends Controller
{
    public function index()
    {
        $panorama = Panorama::orderBy('created_at', 'DESC')->paginate(3);

        return view('admin.pariwisata.pariwisataKawasan.pariwisata.panorama.index', ['data' => $panorama]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $panorama = Panorama::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.pariwisataKawasan.pariwisata.panorama.view', ['data' => $panorama]);
    }

    public function create()
    {
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataKawasan.pariwisata.panorama.create');
        }
    
        return view('admin.404');
    }

    public function store(PariwisataKawasanRequest $request)
    {
        $this->authorize('admin');

        $panorama = Panorama::create([
            'foto' => $request->file('foto')->store('pariwisata_kawasan'),
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($panorama) {
            return redirect('/admin/wisata-kawasan-panorama')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-kawasan-panorama')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $panorama = Panorama::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');

        $panorama = Panorama::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataKawasan.pariwisata.panorama.edit', compact('panorama'));
        }
    
        return view('admin.404');

    }

    public function updated(PariwisataKawasanRequest $request, $id)
    {
        $this->authorize('admin');

        $panorama = Panorama::find($id);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($panorama->foto != null) {
                Storage::delete($panorama->foto);
            }
            
            $panorama->update([
                'foto' => $request->file('foto')->store('pariwisata_kawasan'),
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            // Jika tidak ada file baru yang diunggah, hanya update data lainnya
            $panorama->update([
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($panorama->wasChanged()) {
            return redirect('/admin/wisata-kawasan-panorama')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-kawasan-panorama')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $panorama = Panorama::find($id);

        if($panorama) {
            if($panorama->foto != null) {
                Storage::delete($panorama->foto);
            }

            $panorama->delete();
            return redirect('/admin/wisata-kawasan-panorama')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-kawasan-panorama')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
