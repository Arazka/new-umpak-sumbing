<?php

namespace App\Http\Controllers\Admin\PariwisataKawasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kawasan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\KawasanRequest;

class KawasanController extends Controller
{
    public function index(Request $request)
    {

        $kawasan = Kawasan::orderBy('created_at','DESC')->paginate(3);

        return view('admin.pariwisata.pariwisataKawasan.kawasan.index', ['data' => $kawasan]);
    }

    public function view(Request $request)
    {

        $kawasan = Kawasan::orderBy('created_at','DESC')->paginate();

        return view('admin.pariwisata.pariwisataKawasan.kawasan.view', ['data' => $kawasan]);
    }

    public function create()
    {
        // $this->authorize('admin');
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataKawasan.kawasan.create');
        }
    
        return view('admin.404');

    }

    public function store(KawasanRequest $request)
    {
        $this->authorize('admin');

        $kawasan = Kawasan::create([
            'foto' => $request->file('foto')->store('kawasan'),
            'nama_kawasan' => $request->nama_kawasan,
        ]);

        if ($kawasan) {
            return redirect('/admin/kawasan')->with('success','Data kawasan berhasil ditambahkan!');
        } else {
            return redirect('/admin/kawasan')->with('danger', 'Gagal menambahkan data kawasan.');
        }
    }

    public function show($id)
    {
        $kawasan = Kawasan::find($id);
    }

    public function edit($id)
    {
        // $this->authorize('admin');

        $kawasan = Kawasan::find($id);
        if (Gate::allows('admin')) {
            return view('admin.pariwisata.pariwisataKawasan.kawasan.edit', compact('kawasan'));
        }
    
        return view('admin.404');

    }

    public function updated(KawasanRequest $request, $id)
    {
        $this->authorize('admin');

        $kawasan = Kawasan::find($id);

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            if ($kawasan->foto != null) {
                Storage::delete($kawasan->foto);
            }
            
            $kawasan->update([
                'foto' => $request->file('foto')->store('kawasan'),
                'nama_kawasan' => $request->nama_kawasan,
            ]);
        } else {
            // Jika tidak ada file baru yang diunggah, hanya update data lainnya
            $kawasan->update([
                'nama_kawasan' => $request->nama_kawasan,
            ]);
        }
    
        if ($kawasan->wasChanged()) {
            return redirect('/admin/kawasan')->with('success', 'Data kawasan berhasil diupdate!');
        } else {
            return redirect('/admin/kawasan')->with('danger', 'Data kawasan gagal diupdate.');
        }
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $kawasan = Kawasan::find($id);

        if($kawasan) {
            if($kawasan->foto != null) {
                Storage::delete($kawasan->foto);
            }

            $kawasan->delete();
            return redirect('/admin/kawasan')->with('success','Data kawasan berhasil dihapus!');

        } else {
            return redirect('/admin/kawasan')->with('danger', 'Data kawasan gagal dihapus.');
        }
    }
}
