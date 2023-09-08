<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Http\Requests\BeritaRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $berita = Berita::orderBy('created_at', 'DESC')->paginate(3);
        // $berita = Berita::all();
        // ddd($berita);
        return view('admin.beranda.berita.index', ['data' => $berita]);
    }

    public function view(Request $request)
    {
        $berita = Berita::orderBy('created_at', 'DESC')->paginate();
        // ddd($berita);
        return view('admin.beranda.berita.view', ['data' => $berita]);
    }

    public function create()
    {
        // $this->authorize('admin');

        // return view('admin.beranda.berita.create');

        if (Gate::allows('admin')) {
            return view('admin.beranda.berita.create');
        }
    
        return view('admin.404');
    }

    public function store(BeritaRequest $request)
    {
        $berita = Berita::create([
            'foto' => $request->file('foto')->store('berita'),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($berita) {
            return redirect('/admin/berita')->with('success','Berita berhasil ditambahkan!');
        } else {
            return redirect('/admin/berita')->with('danger', 'Berita gagal ditambahkan.');
        }
    }

    public function show($id)
    {
        $berita = Berita::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');
        $berita = Berita::find($id);

        if (Gate::allows('admin')) {
            return view('admin.beranda.berita.edit', compact('berita'));
        }
    
        return view('admin.404');
    }

    public function updated (BeritaRequest $request, $id)
    {
        $berita = Berita::find($id);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($berita->foto != null) {
                Storage::delete($berita->foto);
            }
            
            $berita->update([
                'foto' => $request->file('foto')->store('berita'),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            // Jika tidak ada file baru yang diunggah, hanya update data lainnya
            $berita->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($berita->wasChanged()) {
            return redirect('/admin/berita')->with('success', 'Berita berhasil diupdate!');
        } else {
            return redirect('/admin/berita')->with('danger', 'Berita gagal ditambahkan.');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $berita = Berita::find($id);

        if($berita) {
            if($berita->foto != null) {
                Storage::delete($berita->foto);
            }

            $berita->delete();
            return redirect('/admin/berita')->with('success','Berita berhasil dihapus!');

        } else {
            return redirect('/admin/berita')->with('danger', 'Berita gagal ditambahkan.');
        }
    }
}
