<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gandusari;
use App\Http\Requests\GandusariRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class GandusariController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('admin');

        $gandusari = Gandusari::orderBy('created_at','DESC')->paginate(3);

        return view('admin.pariwisata.gandusari.index', ['data' => $gandusari]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $gandusari = Gandusari::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.gandusari.view', ['data' => $gandusari]);
    }

    public function create()
    {
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.gandusari.create');
        }
    
        return view('admin.404');
    }

    public function store(GandusariRequest $request)
    {
        $this->authorize('admin');

        $gandusari = Gandusari::create([
            'foto' => $request->file('foto')->store('pariwisata'),
            'judul' => $request->judul,
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
        $gandusari = Gandusari::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');

        $gandusari = Gandusari::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.gandusari.edit', compact('gandusari'));
        }
    
        return view('admin.404');

    }

    public function updated(GandusariRequest $request, $id)
    {
        $this->authorize('admin');

        $gandusari = Gandusari::find($id);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($gandusari->foto != null) {
                Storage::delete($gandusari->foto);
            }
            
            $gandusari->update([
                'foto' => $request->file('foto')->store('pariwisata'),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            // Jika tidak ada file baru yang diunggah, hanya update data lainnya
            $gandusari->update([
                'judul' => $request->judul,
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
        $gandusari = Gandusari::find($id);

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
