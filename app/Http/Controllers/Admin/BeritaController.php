<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Http\Requests\BeritaRequest;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $berita = Berita::orderBy('created_at', 'DESC')->paginate(3);
        // ddd($berita);
        return view('admin.beranda.berita.index', ['data' => $berita]);
    }
    // public function berita(Request $request)
    // {
    //     $berita = Berita::orderBy('created_at', 'DESC')->paginate(3);
    //     return view('welcome', ['data' => $berita]);
    // }

    public function create()
    {
        $this->authorize('admin');
        return view('admin.beranda.berita.create');
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
            return redirect('/admin/berita/create')->with('validationErrors',$berita->message);
        }
    }

    public function show($id)
    {
        $berita = Berita::find($id);
    }

    public function edit($id)
    {
        $this->authorize('admin');
        $berita = Berita::find($id);

        return view('admin.beranda.berita.edit', compact('berita'));
    }

    public function updated (Request $request, $id)
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
            return redirect('/admin/berita/create')->with('validationErrors', $berita->message);
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
            return redirect('/admin/berita')->with('validationErrors',$berita->message);
        }
    }
}
