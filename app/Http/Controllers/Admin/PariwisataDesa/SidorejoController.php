<?php

namespace App\Http\Controllers\Admin\PariwisataDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sidorejo;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class SidorejoController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('admin');

        $sidorejo = Sidorejo::orderBy('created_at','DESC')->paginate(3);

        return view('admin.pariwisata.pariwisataDesa.sidorejo.index', ['data' => $sidorejo]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $sidorejo = Sidorejo::orderBy('created_at','ASC')->paginate();

        return view('admin.pariwisata.pariwisataDesa.sidorejo.view', ['data' => $sidorejo]);
    }

    public function create()
    {
        // $this->authorize('admin');
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.sidorejo.create');
        }
    
        return view('admin.404');

    }

    public function store(WisataRequest $request)
    {
        $this->authorize('admin');

        $sidorejo = Sidorejo::create([
            'foto' => $request->file('foto')->store('pariwisata'),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($sidorejo) {
            return redirect('/admin/wisata-sidorejo')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-sidorejo')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $sidorejo = Sidorejo::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');
        $sidorejo = Sidorejo::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.sidorejo.edit', compact('sidorejo'));
        }
    
        return view('admin.404');

    }

    public function updated(WisataRequest $request, $id)
    {
        $this->authorize('admin');

        $sidorejo = Sidorejo::find($id);

        if ($request->hasFile('foto')) {
            if ($sidorejo->foto != null) {
                Storage::delete($sidorejo->foto);
            }
            
            $sidorejo->update([
                'foto' => $request->file('foto')->store('pariwisata'),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            $sidorejo->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($sidorejo->wasChanged()) {
            return redirect('/admin/wisata-sidorejo')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-sidorejo')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $sidorejo = Sidorejo::find($id);

        if($sidorejo) {
            if($sidorejo->foto != null) {
                Storage::delete($sidorejo->foto);
            }

            $sidorejo->delete();
            return redirect('/admin/wisata-sidorejo')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-sidorejo')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
