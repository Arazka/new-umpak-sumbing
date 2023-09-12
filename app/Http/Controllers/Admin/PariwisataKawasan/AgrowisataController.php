<?php

namespace App\Http\Controllers\Admin\PariwisataKawasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agrowisata;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PariwisataKawasanRequest;

class AgrowisataController extends Controller
{
    public function index()
    {
        $agro = Agrowisata::orderBy('created_at', 'DESC')->paginate(3);

        return view('admin.pariwisata.pariwisataKawasan.pariwisata.agrowisata.index', ['data' => $agro]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $agro = Agrowisata::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.pariwisataKawasan.pariwisata.agrowisata.view', ['data' => $agro]);
    }

    public function create()
    {
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataKawasan.pariwisata.agrowisata.create');
        }
    
        return view('admin.404');
    }

    public function store(PariwisataKawasanRequest $request)
    {
        $this->authorize('admin');

        $agro = Agrowisata::create([
            'foto' => $request->file('foto')->store('pariwisata_kawasan'),
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($agro) {
            return redirect('/admin/wisata-kawasan-agrowisata')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-kawasan-agrowisata')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $agro = Agrowisata::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');

        $agro = Agrowisata::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataKawasan.pariwisata.agrowisata.edit', compact('agro'));
        }
    
        return view('admin.404');

    }

    public function updated(PariwisataKawasanRequest $request, $id)
    {
        $this->authorize('admin');

        $agro = Agrowisata::find($id);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($agro->foto != null) {
                Storage::delete($agro->foto);
            }
            
            $agro->update([
                'foto' => $request->file('foto')->store('pariwisata_kawasan'),
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            // Jika tidak ada file baru yang diunggah, hanya update data lainnya
            $agro->update([
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($agro->wasChanged()) {
            return redirect('/admin/wisata-kawasan-agrowisata')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-kawasan-agrowisata')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $agro = Agrowisata::find($id);

        if($agro) {
            if($agro->foto != null) {
                Storage::delete($agro->foto);
            }

            $agro->delete();
            return redirect('/admin/wisata-kawasan-agrowisata')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-kawasan-agrowisata')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
