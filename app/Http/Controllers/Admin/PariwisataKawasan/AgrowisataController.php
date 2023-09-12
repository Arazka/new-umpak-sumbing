<?php

namespace App\Http\Controllers\Admin\PariwisataKawasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kawasan;
use App\Models\PariwisataKawasan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PariwisataKawasanRequest;

class AgrowisataController extends Controller
{
    public function index()
    {
        $agro = PariwisataKawasan::join('kawasans','kawasans.id','=','pariwisata_kawasans.kawasan_id')
                                    ->where('kawasans.nama_kawasan','=',"Agrowisata")
                                    ->select([
                                        'pariwisata_kawasans.id',
                                        'pariwisata_kawasans.foto',
                                        'pariwisata_kawasans.nama_wisata',
                                        'pariwisata_kawasans.deskripsi',
                                    ])
                                    ->orderBy('pariwisata_kawasans.created_at','DESC')
                                    ->paginate(3);

        return view('admin.pariwisata.pariwisataKawasan.pariwisata.agrowisata.index', ['data' => $agro]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $agro = PariwisataKawasan::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.pariwisataKawasan.pariwisata.agrowisata.view', ['data' => $agro]);
    }

    public function create()
    {
        $kawasan = Kawasan::all();
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataKawasan.pariwisata.agrowisata.create', compact('kawasan'));
        }
    
        return view('admin.404');
    }

    public function store(PariwisataKawasanRequest $request)
    {
        $this->authorize('admin');

        $agro = PariwisataKawasan::create([
            'kawasan_id' => $request->kawasan_id,
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
        $agro = PariwisataKawasan::find($id);
    }

    public function edit($id)
    {
        $kawasan = Kawasan::all();
        $agro = PariwisataKawasan::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataKawasan.pariwisata.agrowisata.edit', compact('agro', 'kawasan'));
        }
    
        return view('admin.404');

    }

    public function updated(PariwisataKawasanRequest $request, $id)
    {
        $this->authorize('admin');

        $agro = PariwisataKawasan::find($id);

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
        $agro = PariwisataKawasan::find($id);

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
