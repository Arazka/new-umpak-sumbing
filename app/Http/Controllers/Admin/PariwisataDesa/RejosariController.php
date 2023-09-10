<?php

namespace App\Http\Controllers\Admin\PariwisataDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rejosari;
use App\Http\Requests\RejosariRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class RejosariController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('admin');

        $rejosari = Rejosari::orderBy('created_at','DESC')->paginate(3);

        return view('admin.pariwisata.pariwisataDesa.rejosari.index', ['data' => $rejosari]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $rejosari = Rejosari::orderBy('created_at','ASC')->paginate();

        return view('admin.pariwisata.pariwisataDesa.rejosari.view', ['data' => $rejosari]);
    }

    public function create()
    {
        // $this->authorize('admin');
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.rejosari.create');
        }
    
        return view('admin.404');
    }

    public function store(RejosariRequest $request)
    {
        $this->authorize('admin');

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pariwisata');
        }

        $rejosari = Rejosari::create($data);

        if ($rejosari) {
            return redirect('/admin/wisata-rejosari')->with('success', 'Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-rejosari')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }


    public function show($id)
    {
        $rejosari = Rejosari::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');

        $rejosari = Rejosari::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.rejosari.edit', compact('rejosari'));
        }
    
        return view('admin.404');

    }

    public function updated(RejosariRequest $request, $id)
    {
        $this->authorize('admin');

        $rejosari = Rejosari::find($id);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($rejosari->foto != null) {
                Storage::delete($rejosari->foto);
            }
            
            $rejosari->update([
                'foto' => $request->file('foto')->store('pariwisata'),
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
        $rejosari = Rejosari::find($id);

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
