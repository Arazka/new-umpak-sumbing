<?php

namespace App\Http\Controllers\Admin\PariwisataDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PariwisataDesa;
use App\Models\Desa;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class GandusariController extends Controller
{
    public function index(Request $request)
    {
        $gandusari = PariwisataDesa::join('desas','desas.id', '=', 'pariwisata_desas.desa_id')
                                    ->where('desas.nama_desa', '=', "Desa Gandusari")
                                    ->select([
                                        'pariwisata_desas.id',
                                        'pariwisata_desas.foto',
                                        'pariwisata_desas.nama_wisata',
                                        'pariwisata_desas.deskripsi',
                                    ])
                                    ->orderBy('pariwisata_desas.created_at', 'DESC')
                                    ->paginate(3);

        return view('admin.pariwisata.pariwisataDesa.gandusari.index', ['data' => $gandusari]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $gandusari = PariwisataDesa::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.pariwisataDesa.gandusari.view', ['data' => $gandusari]);
    }

    public function create()
    {
        $desa = Desa::all();
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.gandusari.create', compact('desa'));
        }
    
        return view('admin.404');
    }

    public function store(WisataRequest $request)
    {
        $this->authorize('admin');

        $gandusari = PariwisataDesa::create([
            'desa_id' => $request->desa_id,
            'foto' => $request->file('foto')->store('pariwisata_desa'),
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($gandusari) {
            return redirect('/admin/wisata-gandusari')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-gandusari/')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $gandusari = PariwisataDesa::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');
        $desa = Desa::all();
        $gandusari = PariwisataDesa::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.gandusari.edit', compact('gandusari', 'desa'));
        }
    
        return view('admin.404');

    }

    public function updated(WisataRequest $request, $id)
    {
        $this->authorize('admin');

        $gandusari = PariwisataDesa::find($id);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($gandusari->foto != null) {
                Storage::delete($gandusari->foto);
            }
            
            $gandusari->update([
                'foto' => $request->file('foto')->store('pariwisata_desa'),
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            // Jika tidak ada file baru yang diunggah, hanya update data lainnya
            $gandusari->update([
                'nama_wisata' => $request->nama_wisata,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($gandusari->wasChanged()) {
            return redirect('/admin/wisata-gandusari')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-gandusari')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $gandusari = PariwisataDesa::find($id);

        if($gandusari) {
            if($gandusari->foto != null) {
                Storage::delete($gandusari->foto);
            }

            $gandusari->delete();
            return redirect('/admin/wisata-gandusari')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-gandusari')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
