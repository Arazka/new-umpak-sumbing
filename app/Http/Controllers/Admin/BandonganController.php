<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bandongan;
// use App\Http\Requests\BandonganRequest;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class BandonganController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('admin');

        $bandongan = Bandongan::orderBy('created_at','DESC')->paginate(3);

        return view('admin.pariwisata.bandongan.index', ['data' => $bandongan]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $bandongan = Bandongan::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.bandongan.view', ['data' => $bandongan]);
    }

    public function create()
    {
        // $this->authorize('admin');
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.bandongan.create');
        }
    
        return view('admin.404');

    }

    public function store(WisataRequest $request)
    {
        $this->authorize('admin');

        $bandongan = Bandongan::create([
            'foto' => $request->file('foto')->store('pariwisata'),
            'judul' => $request->judul,
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
        $bandongan = Bandongan::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');

        $bandongan = Bandongan::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.bandongan.edit', compact('bandongan'));
        }
    
        return view('admin.404');

    }

    public function updated(WisataRequest $request, $id)
    {
        $this->authorize('admin');

        $bandongan = Bandongan::find($id);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($bandongan->foto != null) {
                Storage::delete($bandongan->foto);
            }
            
            $bandongan->update([
                'foto' => $request->file('foto')->store('pariwisata'),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            // Jika tidak ada file baru yang diunggah, hanya update data lainnya
            $bandongan->update([
                'judul' => $request->judul,
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
        $bandongan = Bandongan::find($id);

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
