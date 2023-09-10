<?php

namespace App\Http\Controllers\Admin\PariwisataDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ngepanrejo;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class NgepanrejoController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('admin');

        $ngepanrejo = Ngepanrejo::orderBy('created_at','DESC')->paginate(3);

        return view('admin.pariwisata.pariwisataDesa.ngepanrejo.index', ['data' => $ngepanrejo]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $ngepanrejo = Ngepanrejo::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.pariwisataDesa.ngepanrejo.view', ['data' => $ngepanrejo]);
    }

    public function create()
    {
        // $this->authorize('admin');
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.ngepanrejo.create');
        }
    
        return view('admin.404');

    }

    public function store(WisataRequest $request)
    {
        $this->authorize('admin');

        $ngepanrejo = Ngepanrejo::create([
            'foto' => $request->file('foto')->store('pariwisata'),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($ngepanrejo) {
            return redirect('/admin/wisata-ngepanrejo')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-ngepanrejo')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $ngepanrejo = Ngepanrejo::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');
        $ngepanrejo = Ngepanrejo::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.ngepanrejo.edit', compact('ngepanrejo'));
        }
    
        return view('admin.404');

    }

    public function updated(WisataRequest $request, $id)
    {
        $this->authorize('admin');

        $ngepanrejo = Ngepanrejo::find($id);

        if ($request->hasFile('foto')) {
            if ($ngepanrejo->foto != null) {
                Storage::delete($ngepanrejo->foto);
            }
            
            $ngepanrejo->update([
                'foto' => $request->file('foto')->store('pariwisata'),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            $ngepanrejo->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($ngepanrejo->wasChanged()) {
            return redirect('/admin/wisata-ngepanrejo')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-ngepanrejo')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $ngepanrejo = Ngepanrejo::find($id);

        if($ngepanrejo) {
            if($ngepanrejo->foto != null) {
                Storage::delete($ngepanrejo->foto);
            }

            $ngepanrejo->delete();
            return redirect('/admin/wisata-ngepanrejo')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-ngepanrejo')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
