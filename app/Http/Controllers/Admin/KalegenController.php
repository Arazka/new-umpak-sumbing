<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kalegen;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class KalegenController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('admin');

        $kalegen = Kalegen::orderBy('created_at','DESC')->paginate(3);

        return view('admin.pariwisata.kalegen.index', ['data' => $kalegen]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $kalegen = Kalegen::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.kalegen.view', ['data' => $kalegen]);
    }

    public function create()
    {
        // $this->authorize('admin');
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.kalegen.create');
        }
    
        return view('admin.404');

    }

    public function store(WisataRequest $request)
    {
        $this->authorize('admin');

        $kalegen = Kalegen::create([
            'foto' => $request->file('foto')->store('pariwisata'),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($kalegen) {
            return redirect('/admin/wisata-kalegen')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-kalegen')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $kalegen = Kalegen::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');

        $kalegen = Kalegen::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.kalegen.edit', compact('kalegen'));
        }
    
        return view('admin.404');

    }

    public function updated(WisataRequest $request, $id)
    {
        $this->authorize('admin');
    
        $kalegen = Kalegen::find($id);

        if ($request->hasFile('foto')) {
            if ($kalegen->foto != null) {
                Storage::delete($kalegen->foto);
            }
            
            $kalegen->update([
                'foto' => $request->file('foto')->store('pariwisata'),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            $kalegen->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($kalegen->wasChanged()) {
            return redirect('/admin/wisata-kalegen')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-kalegen')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $kalegen = Kalegen::find($id);

        if($kalegen) {
            if($kalegen->foto != null) {
                Storage::delete($kalegen->foto);
            }

            $kalegen->delete();
            return redirect('/admin/wisata-kalegen')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-kalegen')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
