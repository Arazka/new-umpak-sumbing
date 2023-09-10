<?php

namespace App\Http\Controllers\Admin\PariwisataDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trasan;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class TrasanController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('admin');

        $trasan = Trasan::orderBy('created_at','DESC')->paginate(3);

        return view('admin.pariwisata.pariwisataDesa.trasan.index', ['data' => $trasan]);
    }

    public function view(Request $request)
    {
        // $this->authorize('admin');

        $trasan = Trasan::orderBy('created_at','ASC')->paginate();

        return view('admin.pariwisata.pariwisataDesa.trasan.view', ['data' => $trasan]);
    }

    public function create()
    {
        // $this->authorize('admin');
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.trasan.create');
        }
    
        return view('admin.404');

    }

    public function store(WisataRequest $request)
    {
        $this->authorize('admin');

        $trasan = Trasan::create([
            'foto' => $request->file('foto')->store('pariwisata'),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($trasan) {
            return redirect('/admin/wisata-trasan')->with('success','Data wisata berhasil ditambahkan!');
        } else {
            return redirect('/admin/wisata-trasan')->with('danger', 'Gagal menambahkan data wisata.');
        }
    }

    public function show($id)
    {
        $trasan = Trasan::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');

        $trasan = Trasan::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataDesa.trasan.edit', compact('trasan'));
        }
    
        return view('admin.404');

    }

    public function updated(WisataRequest $request, $id)
    {
        $this->authorize('admin');

        $trasan = Trasan::find($id);

        if ($request->hasFile('foto')) {
            if ($trasan->foto != null) {
                Storage::delete($trasan->foto);
            }
            
            $trasan->update([
                'foto' => $request->file('foto')->store('pariwisata'),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            $trasan->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }
    
        if ($trasan->wasChanged()) {
            return redirect('/admin/wisata-trasan')->with('success', 'Data wisata berhasil diupdate!');
        } else {
            return redirect('/admin/wisata-trasan')->with('danger', 'Data wisata gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $trasan = Trasan::find($id);

        if($trasan) {
            if($trasan->foto != null) {
                Storage::delete($trasan->foto);
            }

            $trasan->delete();
            return redirect('/admin/wisata-trasan')->with('success','Data wisata berhasil dihapus!');

        } else {
            return redirect('/admin/wisata-trasan')->with('danger', 'Data wisata gagal dihapus!');
        }
    }
}
